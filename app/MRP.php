<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MRP extends Model
{
    protected $table = 'mrp';

    public function pegawai()
    {
    	return $this->belongsTo('App\Pegawai');
    }

    public function skstg()
    {
    	return $this->hasOne('App\SKSTg');
    }
}
