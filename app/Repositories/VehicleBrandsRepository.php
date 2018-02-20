<?php


namespace App\Repositories;


use App\Models\VehicleBrand;

class VehicleBrandsRepository extends Repository
{
    /**
     * @return VehicleBrand
     */
    public function getModel()
    {
        return (new VehicleBrand());
    }

}