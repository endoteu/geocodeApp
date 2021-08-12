<?php
require_once('providers.php');
class openstreetmap implements providers
{
  private $request_url;
  private $api_key;

  public function __construct()
  {
      $this->request_url = 'https://nominatim.openstreetmap.org/search?q=';
      $this->api_key = '';
  }

  public function getCoordinates($address)
    {
      // The actual request is commented, because we don't have actual API key. We'll work with the mocked response
      /*
      $encoded_address = urlencode($address);
      $url = $this->request_url . $encoded_address . '&format=json&limit=1';
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $response= json_decode(curl_exec($ch), true);
      */
      $mockup_response = file_get_contents(__DIR__ . '/osm.json');

      $response = json_decode($mockup_response, true);

      $coordinates = array("latitude" => '', "longitude" => '');

      if (!empty($response) && isset($response[0]['lat']) && isset($response[0]['lon'])) {
        $coordinates['latitude'] = $response[0]['lat'];
        $coordinates['longitude'] = $response[0]['lon'];
      }

      return $coordinates;
    }
}
