<?php
require_once('providers.php');
class googlemaps implements providers
{
  private $request_url;
  private $api_key;

  public function __construct()
  {
      $this->request_url = "https://maps.googleapis.com/maps/api/geocode/json?address=";
      $this->api_key = "123456";
  }

  public function getCoordinates($address)
    {
        // The actual request is commented, because we don't have actual API key. We'll work with the mocked response
        /*
        $encoded_address = urlencode($address);
        $url = $this->request_url . $encoded_address . '&key=' . $this->api_key;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response= json_decode(curl_exec($ch), true);
        */
        // Mockup response
        $mockup_response = file_get_contents(__DIR__ . '/gm.json');

        $response = json_decode($mockup_response, true);

        $coordinates = array("latitude" => '', "longitude" => '');

        if (!empty($response) && isset($response['results'][0]['geometry']['location']['lat']) && isset($response['results'][0]['geometry']['location']['lng'])) {
            $coordinates['latitude'] = $response['results'][0]['geometry']['location']['lat'];
            $coordinates['longitude'] = $response['results'][0]['geometry']['location']['lng'];
        }

        return $coordinates;
    }
}
