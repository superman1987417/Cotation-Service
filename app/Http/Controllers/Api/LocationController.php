<?php


namespace App\Http\Controllers\Api;

use App\Repositories\LocationRepository;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function byCep($cep)
    {
        $location = new LocationRepository();
        return $location->byCep($cep);
    }

}