<?php


namespace App\Repositories;


use App\Models\VehicleVersion;

class VehicleVersionsRepository extends Repository
{
    /**]
     * @return VehicleVersion
     */
    public function getModel()
    {
        return (new VehicleVersion());
    }
}