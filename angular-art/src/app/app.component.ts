import { Component } from '@angular/core';
import { Login } from './login';

import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {


  constructor(private http: HttpClient) {}

  loginModel = new Login('','');

  title = 'angular-art';

  data_submitted = '';
  
  
  logindata = new Login('','');

  responsedata = new Login('','');
  
  onLogin(form: any): void{
    this.data_submitted = form;
    
    let params = JSON.stringify(form);


    this.http.post<Login>('http://localhost/art-see/login.php',params).subscribe((response_from_php)=>{
      this.responsedata = response_from_php;
    }, (error_in_communication) => {
      console.log('Error', error_in_communication)
    })
  }
}

