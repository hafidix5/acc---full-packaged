<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class invoices extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'invoices';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $date = 'dd/mm/yyyy';


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'id',
                  'date',
                  'file_invoice',
                  'vendors_id'
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
     * Get the Vendor for this model.
     *
     * @return App\Models\Vendor
     */
    public function Vendor()
    {
        return $this->belongsTo('App\Models\vendors','vendors_id','id');
    }

    /**
     * Get the expenditure for this model.
     *
     * @return App\Models\Expenditure
     */
    public function expenditure()
    {
        return $this->hasOne('App\Models\expenditures','invoices_id','id');
    }

    /**
     * Set the date.
     *
     * @param  string  $value
     * @return void
     */
    /* public function setDateAttribute($value)
    {
        $this->attributes['date'] = !empty($value) ? \DateTime::createFromFormat('j/n/Y g:i A', $value) : null;
    } */

    /**
     * Get date in array format
     *
     * @param  string  $value
     * @return array
     */
    /* public function getDateAttribute($value)
    {
        return \Date::createFromFormat($this->getDateFormat(), $value)->format('d/m/Y');
    } */

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
