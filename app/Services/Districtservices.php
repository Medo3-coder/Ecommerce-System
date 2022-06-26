<?php

namespace App\Services;

use App\Models\ShipDistrict;

class Districtservices
{
   public function storeDistrict(array $data)
   {
      $district = ShipDistrict::create($data);
      return  $district;
   }

   public function updateDistrict(array $data , $id)
   {
      $data['id'] = $id ;
      $districtUpdate = ShipDistrict::findOrFail($data['id']);
      $districtUpdate->update($data);
   }
}
