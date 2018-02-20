<?php


namespace App\Repositories;


use App\Models\Quote;

class QuotesRepository extends Repository
{
    /**
     * @return Quote
     */
    public function getModel()
    {
        return (new Quote());
    }
}