<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\PeopleRepository;

class PeopleController extends Controller
{

    public function show($cpf)
    {
        $peopleRepository = new PeopleRepository();
        return $peopleRepository->find($cpf);
    }
}