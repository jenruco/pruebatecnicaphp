import { Component, OnInit } from '@angular/core';
import { TurnServiceService } from '../turn-service.service';
import { User } from '../User';
import {Router} from "@angular/router"
import { catchError } from 'rxjs';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  user:User = new User(0,'','')
  constructor(private turnService: TurnServiceService, private router: Router) { }

  ngOnInit(): void {
  }

  login(){
    this.turnService.login(this.user)
    .pipe(
      catchError(err=>{
        alert('Verifque sus credenciales')
        return err
      })
    )
    .subscribe(x=>{
      this.router.navigate(['/index'])
    })
  }

  register(){
    this.router.navigate(['/register'])
  }

}
