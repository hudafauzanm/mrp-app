<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormasiJabatan extends Model
{
    protected $table = 'formasi_jabatan';
	protected $primaryKey='id';
    public $incrementing = false;

    public function personnel_area()
    {
    	return $this->belongsTo('App\PersonnelArea');
    }

    public function pegawai()
    {
    	return $this->hasMany('App\Pegawai');
    }

    public function mrp_tujuan()
    {
        return $this->hasMany('App\MRP', 'fj_tujuan');
    }

    public function mrp_asal()
    {
        return $this->hasMany('App\MRP', 'fj_asal');
    }
}