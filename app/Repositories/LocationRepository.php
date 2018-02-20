<?php


namespace App\Repositories;


use App\Models\Location;

class LocationRepository extends Repository
{
    /**
     * @return Location
     */
    public function getModel()
    {
        return (new Location());
    }

    public function byCep($cep)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'viacep.com.br/ws/'.$cep.'/json/');
        return $res->getBody();
    }
}