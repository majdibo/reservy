import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'mw-clients',
  template: `<h1>Clients Component</h1>
             <router-outlet></router-outlet>`,
})
export class ClientsComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }

}
