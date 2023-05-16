import {MongoClient,Database,} from "https://deno.land/x/mongo@v0.31.1/mod.ts";
import { ParkingSchema, UserSchema } from "./schema.ts";
  
  const connectMongoDB = async (): Promise<Database> => {
    const mongo_url = `mongodb+srv://jorgeca2002:1357924680@cluster0.aedynyz.mongodb.net/Parking?authMechanism=SCRAM-SHA-1`
    const client = new MongoClient();
    console.log("Connecting to MongoDB...");
    await client.connect(mongo_url);
    console.log("Connected to MongoDB!");
    const db = client.database("parking");
    return db;
  };
  
  const db = await connectMongoDB();
  export const adminCollection = db.collection<UserSchema>("admin");
  export const parkingCollection = db.collection<ParkingSchema>("parking");