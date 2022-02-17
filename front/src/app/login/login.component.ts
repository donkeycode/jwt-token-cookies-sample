import { Component } from '@angular/core';
import { catchError, of } from 'rxjs';
import { AuthentService } from '../authent.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent {
  public user = {
    email: "cedric@donkeycode.com",
    password: "demo"
  };

  constructor(private authentService: AuthentService) {

  }

  ngOnInit() {
    this.authentService.articles().subscribe(authResponse => {
      alert('OK connected');
    }, () => {
      alert('Not logged');
    });
  }

  login() {

    this.authentService.auth(this.user)
    .subscribe(authResponse => {
      console.log(authResponse);
      alert('Login OK');
    }, err => {
      alert('Login Err');
    });
  }


}
