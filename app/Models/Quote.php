<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table = 'quotes';
    protected $guarded = [];
    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contact()
    {
        return $this->hasOne(Contact::class,'contact_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function driver()
    {
        return $this->hasOne(Driver::class,'driver_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class,'location_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clerk()
    {
        return $this->belongsTo(Clerk::class,'clerk_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class,'vehicle_id');
    }

    public function getAllCharacteristics()
    {
        $result = [];
        if($this->is_taxy)
            $result[] = 'taxi';

        if($this->is_uber)
            $result[] = 'uber';

        if($this->is_armored_car)
            $result[] = 'blindado';

        if($this->zero_km)
            $result[] = 'zero km';

        return $result;
    }
}