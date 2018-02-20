<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class QuoteDetail extends Model
{
    protected $table = 'quote_treatment_details';
    protected $guarded =[];
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function clerk()
    {
        return $this->hasOne(Clerk::class,'current_clerk_id');
    }
}