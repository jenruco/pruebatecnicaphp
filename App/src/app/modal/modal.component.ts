import { Component, EventEmitter, Input, OnInit, Output, ViewChild } from '@angular/core';
import { ModalDismissReasons, NgbDatepickerModule, NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { Turn } from '../Turn';

@Component({
  selector: 'app-modal',
  templateUrl: './modal.component.html'
})
export class ModalComponent implements OnInit {
  closeResult = '';
  @ViewChild('content') content: ModalComponent | undefined;
  @Input() turn : Turn = new Turn(0,'','','','','','')
  @Output() dispachTurn = new EventEmitter<Turn>();
  constructor(private modalService: NgbModal) { }

  ngOnInit(): void {
  }

  open(content:any) {
		this.modalService.open(content, { ariaLabelledBy: 'modal-basic-title' }).result.then(
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

  dispach(){
    //this.content?.closeResult
    //this.modal.close('Save click')
    this.modalService.dismissAll()
    this.dispachTurn.emit(this.turn)
  }

  getFile(event:any){
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => {
      this.turn.file = reader.result as string
        console.log(reader.result);
    };
  }

}
