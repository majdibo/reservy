import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Client } from './client';

@Injectable({
  providedIn: 'root',
})
export class ClientService {

  private baseUrl = 'https://8080-c5ec6ac3-212b-4692-85fa-8c84207af3ff.ws-eu0.gitpod.io/backend/api/clients';

  constructor(private http: HttpClient) { }

  get(id: number): Observable<Object> {
    return this.http.get(`${this.baseUrl}/get.php?id=${id}`);
  }

  create(client: Client): Observable<Object> {
    return this.http.post(`${this.baseUrl}/put.php`, JSON.stringify(client));
  }

  update(value: Client): Observable<Object> {
    return this.http.post(`${this.baseUrl}/post.php`, JSON.stringify(value));
  }

  delete(id: number): Observable<any> {
    return this.http.delete(`${this.baseUrl}/delete.php?id=${id}`, { responseType: 'text' });
  }

  getList(): Observable<any> {
    return this.http.get(`${this.baseUrl}/get.php`);
  }
}
