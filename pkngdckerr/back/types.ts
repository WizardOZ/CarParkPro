export type User = {
    id?: string;
    username: string;
    password: string;
    email: string;
    parking: string;

}
export type Parking = {
    id?: string;
    name: string;
    plazas:{matricula:string,ocupado:boolean}[][];    
}
