<?php

namespace App\Services;

use App\Models\ShipState;

class StateService
{
    public function storeShippingState(array $data)
    {
         $state = ShipState::create($data);
         return  $state ;
    }
    public function updateShippingState(array $data , $id)
    {
        $data['id'] = $id ;
        $state = ShipState::findOrFail($data['id']);
        $state->update($data);

    }

}
