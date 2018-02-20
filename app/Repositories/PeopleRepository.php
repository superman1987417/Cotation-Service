<?php

namespace App\Repositories;


class PeopleRepository
{
    /**
     * @return People
     */
    public function find($cpf)
    {
        return [
            'name' => 'Machado de Assis',
            'birthday' => '1850-02-20',
        ];
    }

}