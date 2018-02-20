<?php


namespace App\Repositories;


use App\Models\QuoteDetail;

class QuotesDetailsRepository extends Repository
{
    /**
     * @return QuoteDetail
     */
    public function getModel()
    {
        return (new QuoteDetail());
    }


}