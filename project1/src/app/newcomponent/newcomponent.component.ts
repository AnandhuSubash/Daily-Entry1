import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-newcomponent',
  templateUrl: './newcomponent.component.html',
  styleUrls: ['./newcomponent.component.css']
})
export class NewcomponentComponent implements OnInit {
    message:string="hello";
    message2:string=new Date().toDateString();
    num:number=10;
  constructor() { }

  ngOnInit() {
    
  }
  add(a:Number,b:Number){return a+b;}
}
