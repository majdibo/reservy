import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {ClientsComponent} from './clients.component';
import { ClientListComponent } from './client-list/client-list.component';
import { ClientCreateComponent } from './client-create/client-create.component';

const routes: Routes = [{
  path: '',
  component: ClientsComponent,
  children: [
    {path: 'list', component: ClientListComponent},
    {path: 'create', component: ClientCreateComponent},
    {
      path: '',
      redirectTo: 'list',
      pathMatch: 'full',
    },
  ],

}];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ClientsRoutingModule { }
