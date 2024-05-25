<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class housings_roles extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'housings_roles';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                    'id',
                  'category',
                  'name'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the housingsEggsorted for this model.
     *
     * @return App\Models\HousingsEggsorted
     */
    public function housingsEggsorted()
    {
        return $this->hasOne('App\Models\housings_eggsorteds','roles_id','id');
    }

    /**
     * Get the housingsGivefeed for this model.
     *
     * @return App\Models\HousingsGivefeed
     */
    public function housingsGivefeed()
    {
        return $this->hasOne('App\Models\housings_givefeeds','roles_id','id');
    }

    /**
     * Get the housingsGivetreatment for this model.
     *
     * @return App\Models\HousingsGivetreatment
     */
    public function housingsGivetreatment()
    {
        return $this->hasOne('App\Models\housings_givetreatments','roles_id','id');
    }

    /**
     * Get the housingsHasrole for this model.
     *
     * @return App\Models\HousingsHasrole
     */
    public function housingsHasrole()
    {
        return $this->hasOne('App\Models\housings_hasroles','roles_id','id');
    }


    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

}
