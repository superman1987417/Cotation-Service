<?php


namespace App\Repositories;

use App\Models\Vehicle;
use App\Models\VehicleModel;

class VehicleRepository extends Repository
{
    /**
     * @return Vehicle
     */
    public function getModel()
    {
       return (new Vehicle());
    }

    public function showByLicensePlate($license_plate)
    {
        $vehicle = new Vehicle();
        $data = $vehicle->where('license_plate', $license_plate)->first();
        return [
            'model_id' => $data->vehicle_model_id,
            'model' => $data->model->description,
            'brand_id' => $data->model->vehicle_brand_id,
            'brand' => $data->model->brand->description,
            'version_id' => $data->vehicle_version_id,
            'version' => $data->version->description,
            'license_plate' => $data->license_plate,
        ];
    }

    public function modelsByBrandId($brand_id)
    {
        $model = new VehicleModel();
        return $model->where('vehicle_brand_id', $brand_id)->get();
    }

}