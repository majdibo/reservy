import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ReservationsComponent } from './reservations.component';
import { ReservationListComponent } from './reservation-list/reservation-list.component';
import { ReservationQuickComponent } from './reservation-quick/reservation-quick.component';

const routes: Routes = [
  {
    path: '',
    component: ReservationsComponent,
    children: [
      {path:'', component:ReservationListComponent},
      {path:'quick', component:ReservationQuickComponent},
      {
        path: '',
        redirectTo: '',
        pathMatch: 'full',
      },
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ReservationsRoutingModule { }
