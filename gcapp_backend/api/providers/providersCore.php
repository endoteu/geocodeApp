<?php
class providersCore {
    public $providers;

    public function __construct()
    {
        $this->providers = array(
            0 => array(
                "code" => "googlemaps",
                "name" => "Google Maps"
            ),
            1 => array(
                "code" => "openstreetmap",
                "name" => "OpenStreet Map"
            ),
        );
    }

    public function getCoordinatesFromAllProviders($address) {
        if (empty($address)) {
            return null;
        }

        $coordinates = array();

        $providers_list = $this->providers;

        foreach ($providers_list as $id => $provider) {
            $provider_class = $provider['code'];

            require_once($provider_class . '.php');

            $$provider_class = new $provider_class;

            $coordinates[] = array(
              "provider" => $provider['name'],
              "coordinates" => $$provider_class->getCoordinates($address)
            );
        }

        return $coordinates;
    }

}
