import { Injectable } from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {map} from "rxjs/operators";
import { Provider } from './provider';

@Injectable({
  providedIn: 'root'
})
export class ProviderService {

  baseUrl = 'http://gcapp';

  constructor(private http: HttpClient) {}

  getProviders() {
    return this.http.get(`${this.baseUrl}/provider.php`).pipe(
      map((res: any) => {
        return res['data'];
      })
    );
  }
}
