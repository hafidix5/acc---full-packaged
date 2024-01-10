<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class expenditures extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expenditures';

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
                  'date',
                  'coas_id',
                  'products_id',
                  'subjects_id',
                  'criterias_id',
                  'departments_id',
                  'vendors_id',
                  'description',
                  'qty',
                  'units_id',
                  'price',
                  'svc_charge',
                  'bank_charge',
                  'signed',
                  'invoice_number',
                  'add_information'
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
     * Get the Coa for this model.
     *
     * @return App\Models\Coa
     */
    public function Coa()
    {
        return $this->belongsTo('App\Models\Coa','coas_id','id');
    }

    /**
     * Get the Product for this model.
     *
     * @return App\Models\Product
     */
    public function Product()
    {
        return $this->belongsTo('App\Models\Product','products_id','id');
    }

    /**
     * Get the Subject for this model.
     *
     * @return App\Models\Subject
     */
    public function Subject()
    {
        return $this->belongsTo('App\Models\Subject','subjects_id','id');
    }

    /**
     * Get the Criteria for this model.
     *
     * @return App\Models\Criteria
     */
    public function Criteria()
    {
        return $this->belongsTo('App\Models\Criteria','criterias_id','id');
    }

    /**
     * Get the Department for this model.
     *
     * @return App\Models\Department
     */
    public function Department()
    {
        return $this->belongsTo('App\Models\Department','departments_id','id');
    }

    /**
     * Get the Vendor for this model.
     *
     * @return App\Models\Vendor
     */
    public function Vendor()
    {
        return $this->belongsTo('App\Models\Vendor','vendors_id','id');
    }

    /**
     * Get the Unit for this model.
     *
     * @return App\Models\Unit
     */
    public function Unit()
    {
        return $this->belongsTo('App\Models\Unit','units_id','id');
    }

    /**
     * Get the generalLedger for this model.
     *
     * @return App\Models\GeneralLedger
     */
    public function generalLedger()
    {
        return $this->hasOne('App\Models\GeneralLedger','expenditures_id','id');
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
