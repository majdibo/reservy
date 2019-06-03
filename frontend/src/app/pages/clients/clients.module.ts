import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ThemeModule } from '../../@theme/theme.module';
import { Ng2SmartTableModule } from 'ng2-smart-table';

import { ClientsRoutingModule } from './clients-routing.module';
import { ClientsComponent } from './clients.component';
import { ClientListComponent } from './client-list/client-list.component';
import { ClientCreateComponent } from './client-create/client-create.component';
import { ClientDetailsComponent } from './client-details/client-details.component';

@NgModule({
  declarations: [ClientsComponent, ClientListComponent, ClientCreateComponent, ClientDetailsComponent],
  imports: [
    CommonModule,
    ThemeModule,
    Ng2SmartTableModule,
    ClientsRoutingModule,
  ],
})
export class ClientsModule { }
