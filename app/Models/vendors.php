<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vendors extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vendors';

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
                  'company_name',
                  'company_address',
                  'npwp',
                  'sales_name',
                  'contact',
                  'bank_name',
                  'account_number',
                  'payment_method'
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
     * Get the expenditure for this model.
     *
     * @return App\Models\Expenditure
     */
    public function expenditure()
    {
        return $this->hasOne('App\Models\Expenditure','vendors_id','id');
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