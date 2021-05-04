import { Component } from '@angular/core';
import "@angular/compiler";
import { Router } from '@angular/router';
import {Login} from './login';
import {Signup} from './signup';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})



export class AppComponent {
  title = 'art-see';

  data_submitted = '';
  confirm_msg = '';

  signupModel = new Signup('','','','','');
  loginModel = new Login('','');

  constructor(
    private router: Router,
    private http: HttpClient
) {}

confirmSignup(data: any): void {
  console.log(data.firstName);
  console.log("data: " , data)

  this.confirm_msg = 'Thank you, ' + data.username;

  
}

responsedata = new Signup('','','','','');
loginresponse = new Login('','');

onSubmit(form: any): void {
  console.log("inside the onsubmit");

  this.data_submitted = form;

  let params = JSON.stringify(form);

  this.http.post<Signup>('https://reqres.in/api/posts',params).subscribe((response_from_php)=>{
    this.responsedata = response_from_php;
  },(error_in_comm)=>{
    console.log('Error occurs', error_in_comm);
  })


}

confirmLogin(data: any): void {
  console.log(data.firstName);
  console.log("data: " , data)

  this.confirm_msg = 'Thank you, ' + data.username;

  
}


onLogin(form: any): void {
  console.log("inside the onlogin");

  this.data_submitted = form;

  let params = JSON.stringify(form);

  this.http.post<Login>('https://reqres.in/api/posts',params).subscribe((response_from_php)=>{
    this.loginresponse = response_from_php;
  },(error_in_comm)=>{
    console.log('Error occurs', error_in_comm);
  })


}

  
}