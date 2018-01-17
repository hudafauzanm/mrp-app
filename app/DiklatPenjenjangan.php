<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiklatPenjenjangan extends Model
{
    protected $table = 'diklat_penjenjangan';
    protected $primaryKey='id';
    public $incrementing = false;

    public function pegawai()
    {
    	return $this->belongsTo('App\Pegawai');
    }

}
