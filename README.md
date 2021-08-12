# geocodeApp
Angular/PHP Geocode app

# Task description
Retrieve and display coordinates (longitude and latitude) for an address, using Google Maps and OpenStreetMap (OSM). Show results from both Google Maps and OSM.

# Requirements:

Frontend. Angular 2 application with the ability to enter the address manually and display the results.
Backend. PHP application using OOP. Make the implementation easily expandable, with ability to add additional APIs to retrieve coordinates by address. Write some unit tests.

# Summary
For the development of this task, I have used PHP7.4 and Angular 12.2.0 CLI. Everything is developed and tested on local environment, using Apache for runinng the PHP backend and Angular CLI, to serve the front-end. Because the front-end is communicating with the back-end through the HttpClient module, CORS: Access-Control-Allow-Origin must be allowed.

# Backend structure
Inside the gcapp_backend folder are the two main scripts which are extracting the necessary information, geocode.php and provider.php

# geocode.php
The script returns coordinates for given address from all providers. It creates instance of the providersCore class, which is responsible to get the classes of all available Providers, and send request for coordinates.

# provider.php
The script returns all avilable Providers.

# Scalability
Because of the fact that each provider has his own class, and every provider must implement the common interface, it is very easy to add more providers.

# BaseUrl
The BaseUrl variable in src/app/ geocode.service.ts and provider.service.ts must be set to the address where the backend is hosted.
