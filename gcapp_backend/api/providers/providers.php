<?php
/**
 * Interface providers
 * Must be implemented by every provider
 * @param string $address
 */
interface providers {
  public function getCoordinates($address);
}
