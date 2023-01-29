import { Component, OnInit } from '@angular/core';
import { catchError } from 'rxjs';
import { Turn } from '../Turn';
import { TurnServiceService } from '../turn-service.service';



@Component({
  selector: 'app-turn',
  templateUrl: './turn.component.html',
  styleUrls: ['./turn.component.css']
})
export class TurnComponent implements OnInit {
  turn = new Turn(0,'','','','','','');
  lastTurn:number=0
  turns:Turn[]= []
  constructor(private turnService: TurnServiceService) { }

  ngOnInit(): void {
    this.getAllTurns()
  }

  createTurn(){
    if (!(this.turn.name!='')) return
    this.turnService.createTurn(this.turn)
    .pipe(
      catchError(err=>{
        this.getAllTurns()
        this.turn = new Turn(0,'','','','','','');
        return err
      })
    )
    .subscribe(x=>{
      this.getAllTurns()
      this.turn = new Turn(0,'','','','','','');
    })
  }

  getAllTurns(){
    this.turns = []
    this.turnService.getAllTurns()
    .subscribe(x=>{
      this.turns=x
      this.lastTurn = this.turns.length-1
    })
  }

  dispatch(turn:Turn){
    this.turnService.updateTurn(turn).subscribe(x=>{
      this.getAllTurns()
    })
  }





}
