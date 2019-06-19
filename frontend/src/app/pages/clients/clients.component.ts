import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'mw-clients',
  template: `<nb-route-tabset [tabs]="tabs"></nb-route-tabset>`,
})
export class ClientsComponent implements OnInit {

tabs: any[] = [
    {
      title: 'Clients',
      route: '/pages/clients',
    },
    {
      title: 'Contacts',
      route: '/pages/clients/contacts',
    },
  ];
  constructor() { }

  ngOnInit() {
  }

}
