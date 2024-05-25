<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class housings_hasroles extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'housings_hasroles';

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
                  'id',
                  'housing_id',
                  'roles_id',
                  'hen',
                  'doc',
                  'check_in',
                  'doc_age',
                  'housing_age',
                  'grade',
                  'days_age',
                  'sell',
                  'mortality',
                  'sort_out',
                  'hen_total_real',
                  'hen_total_actual',
                  'insert_1',
                  'from_housing_id',
                  'move',
                  'to_housing_id'
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
     * Get the Housing for this model.
     *
     * @return App\Models\Housing
     */
    public function Housing()
    {
        return $this->belongsTo('App\Models\housings','housing_id','id');
    }

    /**
     * Get the HousingsRole for this model.
     *
     * @return App\Models\HousingsRole
     */
    public function HousingsRole()
    {
        return $this->belongsTo('App\Models\housings_roles','roles_id','id');
    }

    /**
     * Get the fromHousing for this model.
     *
     * @return App\Models\FromHousing
     */
    public function fromHousing()
    {
        return $this->belongsTo('App\Models\housings','from_housing_id');
    }

    /**
     * Get the toHousing for this model.
     *
     * @return App\Models\ToHousing
     */
    public function toHousing()
    {
        return $this->belongsTo('App\Models\housings','to_housing_id');
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
     * Set the doc.
     *
     * @param  string  $value
     * @return void
     */
    public function setDocAttribute($value)
    {
        $this->attributes['doc'] = !empty($value) ? \DateTime::createFromFormat('j/n/Y g:i A', $value) : null;
    }

    /**
     * Set the check_in.
     *
     * @param  string  $value
     * @return void
     */
    public function setCheckInAttribute($value)
    {
        $this->attributes['check_in'] = !empty($value) ? \DateTime::createFromFormat('j/n/Y g:i A', $value) : null;
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
     * Get doc in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getDocAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get check_in in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCheckInAttribute($value)
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
