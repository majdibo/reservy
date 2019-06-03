export class Client {
  id: number;
  name: string;
  type: ClientType;
  contact_id: number;
}


export enum ClientType {
  PHYSIC = 0,
  MORAL = 1,
}
