<?php

namespace App\Repositories;


class LicensePlateRepository
{
    /**
     * @return People
     */
    public function find($number)
    {
        return [
            'name' => 'Machado de Assis',
            'birthday' => '1850-02-20',
        ];
    }

}