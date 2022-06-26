<?php

namespace App\Services;

use App\Models\ShipDivision;

class ShippingService
{
   public function storeDivision(array $data)
   {
      $division = ShipDivision::create($data);
      return $division ;
   }
}
