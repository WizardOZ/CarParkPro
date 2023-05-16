import { Database, ObjectId } from "https://deno.land/x/mongo@v0.31.1/mod.ts";
import { getQuery } from "https://deno.land/x/oak@v11.1.0/helpers.ts";
import { RouterContext } from "https://deno.land/x/oak@v11.1.0/router.ts";
import { UserSchema } from "./db/schema.ts";
import { adminCollection, parkingCollection } from "./db/db.ts";
import { User } from "./types.ts";
import { update } from "https://deno.land/x/mongo@v0.31.1/src/collection/commands/update.ts";



type loginContext = RouterContext<
  "/login/:id",
  {
    id: string;
  } & Record<string | number, string | undefined>,
  Record<string, any>
>;
type registerContext = RouterContext<
  "/register/:id",
  {
    id: string;
  } & Record<string | number, string | undefined>,
  Record<string, any>
>;
type registerParkingContext = RouterContext<
  "/registerparking/:id",
  {
    id: string;
  } & Record<string | number, string | undefined>,
  Record<string, any>
>;
type reloadContext = RouterContext<
  "/reload/:id",
  {
    id: string;
  } & Record<string | number, string | undefined>,
  Record<string, any>
>;
type ocuparContext = RouterContext<
  "/ocupar/:id",
  {
    id: string;
  } & Record<string | number, string | undefined>,
  Record<string, any>
>;
type liberarContext = RouterContext<
  "/liberar/:id",
  {
    id: string;
  } & Record<string | number, string | undefined>,
  Record<string, any>
>;
export const login = async (context: loginContext) => {

    console.log("loggeando...")
    const input = JSON.parse(context.params.id)
    console.log(input)
    const user = await adminCollection.findOne({ username: input.username });
    console.log(user)
    if (user) {
        if (user.password == input.password) {
            context.response.body = String(user._id);
        } else {
            context.response.body = "Contraseña incorrecta";
        }
        }
    console.log("loggeado")
}
export const register = async (context: registerContext) => {

    console.log("registrando...")
    const input = JSON.parse(context.params.id)
    console.log(input)
    const user = await adminCollection.insertOne({ 
        username: input.username 
        ,password: input.password
        ,email: input.email
        ,parking: "parking"});
    context.response.body = String(user);
    console.log("registrado")
}
export const registerParking = async (context: registerParkingContext) => {
    console.log("registrando parking...")
    const input = JSON.parse(context.params.id)
    const arr: {matricula:string,ocupado:boolean}[] = []
    const arr2: {matricula:string,ocupado:boolean}[][] = []
    for (let i = 0; i < input.plazas; i++) {
        arr.push({matricula:"",ocupado:false})
    }
    for (let i = 0; i < input.plantas; i++) {
        arr2.push(arr)
    }
    const parking = await parkingCollection.insertOne({ 
        name: input.name,
        plazas: arr2});
    const user = adminCollection.updateOne({ _id: new ObjectId(input.id) }, { $set: { parking: String(parking) } });
    context.response.body = String(parking);
    if(parking)console.log("parking registrado")
}
export const reload = async (context: reloadContext) => {
    
    const input = JSON.parse(context.params.id)
    console.log("cargando, id: "+input.id)
    const user = await adminCollection.findOne({ _id: new ObjectId(input.id) });
    const parking = await parkingCollection.findOne({ _id: new ObjectId(user?.parking) });
    const userResponse = {username:user?.username,password:user?.password,email:user?.email,parking:parking}
    if(user){
    console.log("cargado")
    context.response.body = JSON.stringify(userResponse);
    }else{console.log("carga fallida")}
}
export const ocupar = async (context: ocuparContext) => {
    console.log("ocupando...")
    const input = JSON.parse(context.params.id)
    const user = await adminCollection.findOne({ _id: new ObjectId(input.id) });
    const parking1 = await parkingCollection.findOne({ _id: new ObjectId(user?.parking) });
    const plazas = parking1?.plazas
    if(plazas){
    plazas[input.planta][input.plaza].matricula = input.matricula
    plazas[input.planta][input.plaza].ocupado = true
    console.log("ocupado")  
    }else{console.log("error al ocupar")}
    const parking = await parkingCollection.updateOne({ _id: new ObjectId(user?.parking) }, { $set: { plazas: plazas } });
}
export const liberar = async (context: liberarContext) => {
    console.log("liberando...")
    const input = JSON.parse(context.params.id)
    const user = await adminCollection.findOne({ _id: new ObjectId(input.id) });
    const parking1 = await parkingCollection.findOne({ _id: new ObjectId(user?.parking) });
    const plazas = parking1?.plazas
    if(plazas){
    plazas[input.planta][input.plaza].matricula = ""
    plazas[input.planta][input.plaza].ocupado = false
    console.log("liberado")
    }else{console.log("error al liberar")}
    const parking = await parkingCollection.updateOne({ _id: new ObjectId(user?.parking) }, { $set: { plazas: plazas } });
}