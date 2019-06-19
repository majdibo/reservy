import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ThemeModule } from '../../../@theme/theme.module';
import { Ng2SmartTableModule } from 'ng2-smart-table';

import { ContactsRoutingModule } from './contacts-routing.module';
import { ContactListComponent } from './contact-list/contact-list.component';

@NgModule({
  declarations: [ContactListComponent],
  imports: [
    CommonModule,
    ThemeModule,
    Ng2SmartTableModule,
    ContactsRoutingModule,
  ],
})
export class ContactsModule { }
