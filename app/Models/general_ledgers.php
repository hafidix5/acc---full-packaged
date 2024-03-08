<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class general_ledgers extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'general_ledgers';

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
                  'date',
                  'expenditures_id',
                  'coas_id',
                  'information',
                  'debet',
                  'credit'
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
     * Get the Expenditure for this model.
     *
     * @return App\Models\Expenditure
     */
    public function Expenditure()
    {
        return $this->belongsTo('App\Models\expenditures','expenditures_id','id');
    }

    /**
     * Get the Coa for this model.
     *
     * @return App\Models\Coa
     */
    public function Coa()
    {
        return $this->belongsTo('App\Models\coas','coas_id','id');
    }

    /**
     * Set the date.
     *
     * @param  string  $value
     * @return void
     */
   /*  public function setDateAttribute($value)
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
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
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
