<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactsRepository extends Repository
{
    /**
     * @return Contact
     */
    public function getModel()
    {
        return (new Contact());
    }

}