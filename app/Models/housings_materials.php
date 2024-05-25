<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class housings_materials extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'housings_materials';

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
                  'category',
                  'units_id',
                  'grade',
                  'age_group',
                  'materia_types_id'
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
     * Get the HousingsUnit for this model.
     *
     * @return App\Models\HousingsUnit
     */
    public function HousingsUnit()
    {
        return $this->belongsTo('App\Models\HousingsUnit','units_id','id');
    }

    /**
     * Get the HousingsMaterialtype for this model.
     *
     * @return App\Models\HousingsMaterialtype
     */
    public function HousingsMaterialtype()
    {
        return $this->belongsTo('App\Models\HousingsMaterialtype','materia_types_id','id');
    }

    /**
     * Get the housingsGivefeed for this model.
     *
     * @return App\Models\HousingsGivefeed
     */
    public function housingsGivefeed()
    {
        return $this->hasOne('App\Models\HousingsGivefeed','materials_id','id');
    }

    /**
     * Get the housingsGivetreatment for this model.
     *
     * @return App\Models\HousingsGivetreatment
     */
    public function housingsGivetreatment()
    {
        return $this->hasOne('App\Models\HousingsGivetreatment','materials_id','id');
    }

    /**
     * Get the housingsStockopname for this model.
     *
     * @return App\Models\HousingsStockopname
     */
    public function housingsStockopname()
    {
        return $this->hasOne('App\Models\HousingsStockopname','materials_id','id');
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
