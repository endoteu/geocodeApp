import { Geocode } from './geocode';
import { GeocodeService } from './geocode.service';

import { Provider } from './provider';
import { ProviderService } from './provider.service';

import {Component, OnInit} from "@angular/core";
import { NgForm } from '@angular/forms';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  providers: Provider[] = [];
  geocodes: Geocode[] = [];
  geocode: Geocode = {address:'',provider:'',coordinates:[]};
  error = '';
  success = '';

  constructor(private providerService: ProviderService, private geocodeService: GeocodeService) {
  }

  ngOnInit() {
    this.getProviders();
  }

  getProviders(): void {
    this.providerService.getProviders().subscribe(
      (data: Provider[]) => {
        // Get providers
        this.providers = data;
      },
      (err) => {
        console.log(err);
        this.error = err;
      }
    );
  }

  getGeocode(f: NgForm) {
    this.resetAlerts();

    this.geocodeService.store(this.geocode).subscribe(
      (data: Geocode) => {
        // Push the coordinates
        this.geocodes.push(data);

        // Inform the user
        this.success = 'Successful retrieval of the coordinates';

        // Reset the form
        f.reset();
      },
      (err) => (this.error = err.message)
    );
  }

  resetAlerts() {
    this.error = '';
    this.success = '';
  }
}
