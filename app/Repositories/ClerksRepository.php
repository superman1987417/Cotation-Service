<?php


namespace App\Repositories;


use App\Models\Clerk;

class ClerksRepository extends Repository
{
    /**
     * @return Clerk
     */
    public function getModel()
    {
        return (new Clerk());
    }

}