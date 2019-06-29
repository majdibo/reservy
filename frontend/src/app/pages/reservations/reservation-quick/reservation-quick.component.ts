import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';
import {ActivatedRoute} from '@angular/router';
import {ReservationService} from '../reservation.service';
import {NbToastrService} from '@nebular/theme';

@Component({
  selector: 'mw-reservation-quick',
  templateUrl: './reservation-quick.component.html',
  styleUrls: ['./reservation-quick.component.scss'],
})
export class ReservationQuickComponent implements OnInit {

  public form: FormGroup;
  constructor(
    private fb: FormBuilder,
    private toastr: NbToastrService,
    private route: ActivatedRoute,
    private reservationService: ReservationService,
  ) { }
  ngOnInit() {
    this.createForm();
  }
  createForm() {
    this.form = this.fb.group({
      note: [null, Validators.required],
      status: [null, Validators.required],
    });
  }
  onSubmit() {
    const data = {
      status: this.form.value.status,
      note: this.form.value.note,
    };
    this.reservationService.create(data).subscribe(
      _ => {
        this.toastr.success('complaints add successfully.');
        this.form.reset();
      },
      err => {
        this.toastr.danger(err.error.err || err.error);
      },
    );
  }
}
