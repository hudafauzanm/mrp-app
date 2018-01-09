<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SKSTg extends Model
{
    protected $table = 'sk_stg';
    
    public function mrp()
    {
    	return $this->hasOne('App\MRP');
    }
}
