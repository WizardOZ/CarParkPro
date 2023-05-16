import { Application, Router } from "https://deno.land/x/oak@v11.1.0/mod.ts";
import { login, register, registerParking, reload, ocupar, liberar } from "./get.ts";
import { User } from "./types.ts";




const router = new Router();

router
  .get("/login/:id", login)
  .get("/register/:id", register)
  .get("/registerparking/:id", registerParking)
  .get("/reload/:id", reload)
  .get("/ocupar/:id", ocupar)
  .get("/liberar/:id", liberar)
  

const app = new Application();

app.use(router.routes());
app.use(router.allowedMethods());
console.log("Server running on port 8080");
await app.listen({ port: 8080 });