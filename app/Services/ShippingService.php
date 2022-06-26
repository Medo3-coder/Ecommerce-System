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

   public function UpdateDivision(array $data , $id)
   {
      $data['id'] = $id;
      $division = ShipDivision::find($data['id']);
      $division->update($data);
      return $division;
   }
}
