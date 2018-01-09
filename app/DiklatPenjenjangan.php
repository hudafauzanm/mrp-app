<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiklatPenjenjangan extends Model
{
    protected $table = 'diklat_penjenjangan';

    public function mrp()
    {
    	return $this->belongsTo('App\MRP');
    }

}
