<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SKSTg extends Model
{
    protected $table = 'sk_stg';
    protected $primaryKey='id';
    public $incrementing = false;
    
    public function mrp()
    {
    	return $this->hasOne('App\MRP', 'mrp_id');
    }

    public function getTglAktivasiAttribute($value)
    {
    	return \Carbon\Carbon::parse($value);
    }
}
