import { Component } from '@angular/core';
import { Signup } from './signup';

import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component-signup.html',
  styleUrls: ['./app.component.css']
})
export class SignupComponent {


  constructor(private http: HttpClient) {}

  signupModel = new Signup('','','','','');

  title = 'angular-art';

  data_submitted = '';

  responsedata = new Signup('','','','','');

  onSignup(form: any):void {
    this.data_submitted = form;

    let params = JSON.stringify(form);



    this.http.post<Signup>('http://localhost/art-see/auth_sql.php',params).subscribe((
      response_from_php) => {
        this.responsedata = response_from_php;
      },(error_in_communication)=>{
        console.log('Error',error_in_communication);
      })
  }
}