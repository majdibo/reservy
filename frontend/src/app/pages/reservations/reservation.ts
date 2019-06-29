export class Reservation {
  status: ReservationStatus;
  note: string;
}


export enum ReservationStatus {
  PLANIFIED,
  DONE,
}
