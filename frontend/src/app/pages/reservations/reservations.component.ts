import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'reservations',
  template: `<nb-route-tabset [tabs]="tabs"></nb-route-tabset>`,
})
export class ReservationsComponent implements OnInit {

tabs: any[] = [
    {
      title: 'Quick Reserve',
      route: '/pages/reservations/quick',
    },
    {
      title: 'Reservations',
      route: '/pages/reservations',
    },
  ];

  constructor() { }

  ngOnInit() {
  }

}
