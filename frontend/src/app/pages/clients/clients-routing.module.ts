import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {ClientsComponent} from './clients.component';
import { ClientListComponent } from './client-list/client-list.component';

const routes: Routes = [{
  path: '',
  component: ClientsComponent,
  children: [
    {path: 'contacts', loadChildren: './contacts/contacts.module#ContactsModule' },
    {path: '', component: ClientListComponent},
    {
      path: '',
      redirectTo: '',
      pathMatch: 'full',
    },
  ],

}];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ClientsRoutingModule { }
