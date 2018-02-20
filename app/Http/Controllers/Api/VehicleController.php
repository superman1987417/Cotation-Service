<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\VehicleRepository;

class VehicleController extends Controller
{

    public function show($license_plate)
    {
        $vehicleRepository = new VehicleRepository();
        return $vehicleRepository->showByLicensePlate($license_plate);
    }

    public function modelsByBrand($brand_id)
    {
        $vehicleRepository = new VehicleRepository();
        return $vehicleRepository->modelsByBrandId($brand_id);
    }
}