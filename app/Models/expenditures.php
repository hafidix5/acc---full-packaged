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
                  'date_payment',
                  'invoices_id',
                  'coas_id',
                  'criterias_id',
                  'departments_id',
                  'description',
                  'qty',
                  'units_id',
                  'price',
                  'svc_charge',
                  'bank_charge',
                  'discount_percentage',
                  'amount',
                  'payment',
                  'signed',
                  'iscash',
                  'method',
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
     * Get the Invoice for this model.
     *
     * @return App\Models\Invoice
     */
    public function Invoice()
    {
        return $this->belongsTo('App\Models\Invoice','invoices_id','id');
    }

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
     * Get the Product for this model.
     *
     * @return App\Models\Product
     */
    

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
     * Set the date_payment.
     *
     * @param  string  $value
     * @return void
     */
    public function setDatePaymentAttribute($value)
    {
        $this->attributes['date_payment'] = !empty($value) ? \DateTime::createFromFormat('j/n/Y', $value) : null;
    }

    /**
     * Get date_payment in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getDatePaymentAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y');
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
