import { Injectable } from '@angular/core';
import { student } from './dbcomponent/student';
import { Observable, throwError } from 'rxjs';
import { HttpClient,HttpErrorResponse} from '@angular/common/http';
import { mapChildrenIntoArray } from '@angular/router/src/url_tree';
import{map,catchError} from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class DbService {

  constructor(private http: HttpClient) { }
  store(student:student):Observable<student[]>{
    return this.http.post('http://localhost/register.php',{data:student}).pipe(
      map((res)=>{
        this.student=(res['data']);
        return this.student;
       
      }),
      catchError(this,handleError));

      private handleError(error: HttpErrorResponse){
        return throwError('error occurred!');
      }
  }
}
