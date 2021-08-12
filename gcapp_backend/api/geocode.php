<?php
// Get the core providers class
require_once ('providers/providersCore.php');
// Create instance of the core class
$core = new providersCore();
// Get the posted data.
$data = file_get_contents("php://input");

if(isset($data) && !empty($data)) {
    // Extract the data.
    $request = json_decode($data);

    // Validate.
    if(empty($request->data->address)) {
        return http_response_code(400);
    } else {
        // Get coordinates for the address, from all providers
        $coordinates = $core->getCoordinatesFromAllProviders($request->data->address);
        echo json_encode(['data'=>$coordinates]);
    }
}
