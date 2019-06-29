import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ReservationsRoutingModule } from './reservations-routing.module';
import { ReservationsComponent } from './reservations.component';
import { ThemeModule } from '../../@theme/theme.module';
import { ReservationListComponent } from './reservation-list/reservation-list.component';
import { ReservationQuickComponent } from './reservation-quick/reservation-quick.component';

@NgModule({
  declarations: [ReservationsComponent, ReservationListComponent, ReservationQuickComponent],
  imports: [
    CommonModule,
    ThemeModule,
    ReservationsRoutingModule
  ]
})
export class ReservationsModule { }
