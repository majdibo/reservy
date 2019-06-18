import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Contact } from './contact';

@Injectable({
  providedIn: 'root',
})
export class ContactService {
private baseUrl = '/contacts';

  constructor(private http: HttpClient) { }

  get(id: number): Observable<any> {
    return this.http.get(`${this.baseUrl}/${id}`);
  }

  create(value: Contact): Observable<Object> {
    return this.http.put(`${this.baseUrl}`, JSON.stringify(value));
  }

  update(value: Contact): Observable<Object> {
    return this.http.post(`${this.baseUrl}`, JSON.stringify(value));
  }

  delete(id: number): Observable<any> {
    return this.http.delete(`${this.baseUrl}/${id}`);
  }

  getList(): Observable<any> {
    return this.http.get(`${this.baseUrl}`);
  }
}
