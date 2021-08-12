import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { Geocode } from './geocode';

@Injectable({
  providedIn: 'root'
})
export class GeocodeService {

  baseUrl = 'http://gcapp';

  constructor(private http: HttpClient) {}

  store(geocode: Geocode) {
    return this.http.post(`${this.baseUrl}/geocode.php`, { data: geocode }).pipe(
      map((res: any) => {
        return res['data'];
      })
    );
  }
}
