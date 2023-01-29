import { Component, EventEmitter, Input, OnInit, Output, ViewChild } from '@angular/core';
import { ModalDismissReasons, NgbDatepickerModule, NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { Turn } from '../Turn';
import { TurnServiceService } from '../turn-service.service';


@Component({
  selector: 'app-history',
  templateUrl: './history.component.html'
})
export class HistoryComponent implements OnInit {
  closeResult = '';
  turns:Turn[]= []

  constructor(private modalService: NgbModal, private turnService: TurnServiceService) { }

  ngOnInit(): void {
    this.getAllTurns()
  }

  open(content:any) {
    this.getAllTurns()
		this.modalService.open(content, { ariaLabelledBy: 'modal-basic-title', size: 'lg' }).result.then(
			(result) => {
				this.closeResult = `Closed with: ${result}`;
			},
			(reason) => {
				this.closeResult = `Dismissed ${this.getDismissReason(reason)}`;
			},
		);
	}

	private getDismissReason(reason: any): string {
		if (reason === ModalDismissReasons.ESC) {
			return 'by pressing ESC';
		} else if (reason === ModalDismissReasons.BACKDROP_CLICK) {
			return 'by clicking on a backdrop';
		} else {
			return `with: ${reason}`;
		}
	}

  getAllTurns(){
    this.turns = []
    this.turnService.getAllTurnsHistory()
    .subscribe(x=>{
      this.turns=x
    })
  }

  downloadPdf(base64String:any) {
    const source = `data:application/pdf;base64,${base64String.replace("data:application/pdf;base64," , "")}`;
    const link = document.createElement("a");
    link.href = source;
    link.download = `ex.pdf`
    link.click();
  }
}
