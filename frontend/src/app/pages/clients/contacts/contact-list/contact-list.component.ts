import { Component, OnInit } from '@angular/core';
import { LocalDataSource } from 'ng2-smart-table';
import { ContactService } from '../contact.service';

@Component({
  selector: 'mw-contact-list',
  templateUrl: './contact-list.component.html',
})
export class ContactListComponent implements OnInit {

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

  constructor(private contactService: ContactService) {}

  ngOnInit() {
    this.buildSettings();
    this.reload();
  }

  onCreateConfirm(event): void {
    this.contactService.create(event.newData).subscribe(res => {
      event.newData.id = res;
      event.confirm.resolve();
      this.reload();
    });


  }

  onSaveConfirm(event): void {
    this.contactService.update(event.newData).subscribe();
    event.confirm.resolve();
  }

  onDeleteConfirm(event): void {
    if (window.confirm('Are you sure you want to delete?')) {
      this.contactService.delete(event.data.id).subscribe();
      event.confirm.resolve();
    } else {
      event.confirm.reject();
    }
  }

  reload(): void {
    this.contactService.getList()
    .subscribe(data => this.source.load(data.records || []));
  }

  buildSettings(): void {
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
                          phone: {
                            title: 'Phone number',
                          },
                        },
                      };
          }
  }

