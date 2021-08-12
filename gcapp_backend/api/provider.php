<?php
/**
 * Get providers
 */
// Get the core providers class
require_once ('providers/providersCore.php');
// Create instance of the core class
$core = new providersCore();

$providers = $core->providers;

if($providers) {
  echo json_encode(['data'=>$providers]);
} else {
  http_response_code(404);
}
