<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SKSTg extends Model
{
    protected $table = 'sk_stg';
    protected $primaryKey='id';
    public $incrementing = false;
    
    public function mrp()
    {
    	return $this->hasOne('App\MRP', 'skstg_id');
    }

    public function getTglAktivasiAttribute($value)
    {
    	return Carbon::parse($value);
    }

    public function getTglKirimSkAttribute($value)
    {
        return Carbon::parse($value);
    }
}
