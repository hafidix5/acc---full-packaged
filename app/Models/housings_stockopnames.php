<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class housings_stockopnames extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'housings_stockopnames';

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
                  'storages_id',
                  'materials_id',
                  'method',
                  'status',
                  'bank',
                  'pic_id'
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
     * Get the HousingsStorage for this model.
     *
     * @return App\Models\HousingsStorage
     */
    public function HousingsStorage()
    {
        return $this->belongsTo('App\Models\HousingsStorage','storages_id','id');
    }

    /**
     * Get the HousingsMaterial for this model.
     *
     * @return App\Models\HousingsMaterial
     */
    public function HousingsMaterial()
    {
        return $this->belongsTo('App\Models\HousingsMaterial','materials_id','id');
    }

    /**
     * Get the pic for this model.
     *
     * @return App\Models\Pic
     */
    public function pic()
    {
        return $this->belongsTo('App\Models\Pic','pic_id');
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
