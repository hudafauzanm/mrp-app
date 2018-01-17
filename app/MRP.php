<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MRP extends Model
{
    protected $table = 'mrp';
    protected $primaryKey='id';
    public $incrementing = false;

    public function pegawai()
    {
    	return $this->belongsTo('App\Pegawai');
    }

    public function skstg()
    {
    	return $this->hasOne('App\SKSTg');
    }

    public function formasi_jabatan()
    {
    	return $this->belongsTo('App\FormasiJabatan');
    }
}
