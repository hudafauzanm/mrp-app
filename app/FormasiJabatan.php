<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormasiJabatan extends Model
{
    protected $table = 'formasi_jabatan';

    public function personnel_area()
    {
    	return $this->belongsTo('App\PersonnelArea');
    }

    public function pegawai()
    {
    	return $this->hasMany('App\Pegawai');
    }
}