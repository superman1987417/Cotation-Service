<?php


namespace App\Repositories;


use App\Models\Driver;

class DriversRepository extends Repository
{
    /**
     * @return Driver
     */
    public function getModel()
    {
        return (new Driver());
    }

}