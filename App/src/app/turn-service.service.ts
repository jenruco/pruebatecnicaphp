import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'
import { Observable, observable } from 'rxjs'
import { Turn } from './Turn';
import { User } from './User';

@Injectable({
  providedIn: 'root'
})
export class TurnServiceService {
  url = 'http://localhost:90/henry-perez/Apii/'
  constructor(private http: HttpClient) { }

  getAllTurns():Observable<any>{
    return this.http.get(this.url+'read.php')
  }

  getAllTurnsHistory():Observable<any>{
    return this.http.get(this.url+'readHistory.php')
  }

  createTurn(turn:Turn):Observable<any>{
    return this.http.post(this.url+'create.php',turn)
  }

  updateTurn(turn:Turn):Observable<any>{
    return this.http.put(this.url+'update.php',turn)
  }
  login(user:User):Observable<any>{
    return this.http.post(this.url+'login.php', user);
  }

  createUser(user:User):Observable<any>{
    return this.http.post(this.url+'createUser.php', user);
  }
}
