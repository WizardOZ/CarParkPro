import { ObjectId } from "https://deno.land/x/mongo@v0.31.1/mod.ts";
import { Parking, User } from "../types.ts";

export type UserSchema = Omit<User, "id"> & { _id: ObjectId };
export type ParkingSchema = Omit<Parking, "id"> & { _id: ObjectId };