import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Client } from './client';

@Injectable({
  providedIn: 'root',
})
export class ClientService {

  private baseUrl = '/clients';

  constructor(private http: HttpClient) { }

  get(id: number): Observable<Object> {
    return this.http.get(`${this.baseUrl}/${id}`);
  }

  create(value: Client): Observable<Object> {
    return this.http.put(`${this.baseUrl}`, JSON.stringify(value));
  }

  update(value: Client): Observable<Object> {
    return this.http.post(`${this.baseUrl}`, JSON.stringify(value));
  }

  delete(id: number): Observable<any> {
    return this.http.delete(`${this.baseUrl}/${id}`);
  }

  getList(): Observable<any> {
    return this.http.get(`${this.baseUrl}`);
  }
}
