<?php


namespace App\Repositories;


use App\Models\VehicleModel;

class VehicleModelsRepository extends Repository
{
    /**
     * @return VehicleModel
     */
    public function getModel()
    {
        return (new VehicleModel());
    }

}