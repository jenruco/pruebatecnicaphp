import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { TurnServiceService } from '../turn-service.service';
import { User } from '../User';

@Component({
  selector: 'app-register-user',
  templateUrl: './register-user.component.html',
  styleUrls: ['./register-user.component.css']
})
export class RegisterUserComponent implements OnInit {
  user:User = new User(0,'','')
  constructor(private turnService: TurnServiceService,  private router: Router) { }

  ngOnInit(): void {
  }

  registerUser(){
    if(!(this.user.nameUser!='' && this.user.password!='')) return

    this.turnService.createUser(this.user)
    .subscribe(x=>{
      this.router.navigate(['/login'])
    })
  }

}
