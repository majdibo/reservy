import { Component, OnInit } from '@angular/core';
import { LocalDataSource } from 'ng2-smart-table';

import { ClientService } from '../client.service';
import { ContactService } from '../contacts/contact.service';
import { ClientType } from '../client';

@Component({
  selector: 'mw-client-list',
  templateUrl: './client-list.component.html',
  styleUrls: ['./client-list.component.scss'],
})
export class ClientListComponent implements OnInit {

// settings has to be initialized with at least these values ...
  settings: any = {
                        add: {
                          addButtonContent: '<i class="nb-plus"></i>',
                        },

                        pager: {
                                display: true,
                                perPage: 10,
                        },
                      };

  source: LocalDataSource = new LocalDataSource();

  constructor(private clientService: ClientService,
              private contactService: ContactService) {}

  ngOnInit() {
    this.buildSettings();
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

  buildSettings(): void {
    this.contactService.getList().subscribe(
          value => {
            this.settings = {
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
                            valuePrepareFunction: (cell,_) => ClientType[cell],
                            editor: {
                                type: 'list',
                                config: {
                                  list: [
                                    {value:ClientType.PHYSIC  ,title:ClientType[ClientType.PHYSIC]},
                                    {value:ClientType.MORAL  ,title:ClientType[ClientType.MORAL]},
                                  ],
                                }
                              },
                            //*/
                          },
                          contact_id: {
                            title: 'Contact',
                            valuePrepareFunction: (cell, _) => value.records.find(contact => contact.id === cell).name ,
                            editor: {
                              type: 'completer',
                              config: {
                                completer: {
                                  data: value.records,
                                  searchFields: 'name',
                                  titleField: 'id',
                                  descriptionField: 'name',
                                },
                              },
                            },
                          },
                        },


                      };
          });

  }
}
