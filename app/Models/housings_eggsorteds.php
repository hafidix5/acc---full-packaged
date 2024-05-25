<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class housings_eggsorteds extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'housings_eggsorteds';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'date';
    protected $keyType = 'string';
    public $incrementing = false;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'roles_id',
                  'housings_id',
                  'storages_id',
                  'total',
                  'ruined',
                  'egg',
                  'big',
                  'medium',
                  'small',
                  'sortir_id',
                  'percent_real',
                  'percent_actual'
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
     * Get the HousingsRole for this model.
     *
     * @return App\Models\HousingsRole
     */
    public function HousingsRole()
    {
        return $this->belongsTo('App\Models\HousingsRole','roles_id','id');
    }

    /**
     * Get the Housing for this model.
     *
     * @return App\Models\Housing
     */
    public function Housing()
    {
        return $this->belongsTo('App\Models\Housing','housings_id','id');
    }

    /**
     * Get the HousingsStorage for this model.
     *
     * @return App\Models\HousingsStorage
     */
    public function HousingsStorage()
    {
        return $this->belongsTo('App\Models\HousingsStorage','storages_id','id');
    }

    /**
     * Get the sortir for this model.
     *
     * @return App\Models\Sortir
     */
    public function sortir()
    {
        return $this->belongsTo('App\Models\Sortir','sortir_id');
    }

    /**
     * Get the housingsSell for this model.
     *
     * @return App\Models\HousingsSell
     */
    public function housingsSell()
    {
        return $this->hasOne('App\Models\HousingsSell','storages_id','storages_id');
    }

    /**
     * Set the date.
     *
     * @param  string  $value
     * @return void
     */
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = !empty($value) ? \DateTime::createFromFormat('j/n/Y g:i A', $value) : null;
    }

    /**
     * Get date in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getDateAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
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
