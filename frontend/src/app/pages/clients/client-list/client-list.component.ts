import { Component, OnInit } from '@angular/core';
import { LocalDataSource } from 'ng2-smart-table';

import { ClientService } from '../client.service';

@Component({
  selector: 'mw-client-list',
  templateUrl: './client-list.component.html',
  styleUrls: ['./client-list.component.scss'],
})
export class ClientListComponent implements OnInit {

  settings = {
    add: {
      addButtonContent: '<i class="nb-plus"></i>',
      createButtonContent: '<i class="nb-checkmark"></i>',
      cancelButtonContent: '<i class="nb-close"></i>',
      confirmCreate: true,
    },
    edit: {
      editButtonContent: '<i class="nb-edit"></i>',
      saveButtonContent: '<i class="nb-checkmark"></i>',
      cancelButtonContent: '<i class="nb-close"></i>',
      confirmSave: true,
    },
    delete: {
      deleteButtonContent: '<i class="nb-trash"></i>',
      confirmDelete: true,
    },
    columns: {

      name: {
        title: 'Name',
        type: 'string',
      },
      type: {
        title: 'Type',
        type: 'string',
      },
      contact_id: {
        title: 'Contact',
        type: 'string',
      },
    },
  };

  source: LocalDataSource = new LocalDataSource();

  constructor(private clientService: ClientService) {
  }

  ngOnInit() {
    this.reload();
  }

  onCreateConfirm(event): void {
    this.clientService.create(event.newData).subscribe(res => {
      event.newData.id = res;
      event.confirm.resolve();
      this.reload();
    });


  }

  onSaveConfirm(event): void {
    this.clientService.update(event.newData).subscribe();
    event.confirm.resolve();
  }

  onDeleteConfirm(event): void {
    if (window.confirm('Are you sure you want to delete?')) {
      this.clientService.delete(event.data.id).subscribe();
      event.confirm.resolve();
    } else {
      event.confirm.reject();
    }
  }

  reload(): void {
    this.clientService.getList()
    .subscribe(data => this.source.load(data.records));
  }
}
