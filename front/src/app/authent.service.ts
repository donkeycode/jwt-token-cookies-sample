import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class AuthentService {

  constructor(private http: HttpClient) { }

  auth(user:any) {
    return this.http.post('http://192.168.1.136:8000/authentication_token', user, {
      withCredentials: true
    });
  }

  articles() {
    return this.http.get('http://192.168.1.136:8000/api/articles', {
      withCredentials: true
    });
  }
}
