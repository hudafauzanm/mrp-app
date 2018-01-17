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

    public function mrp()
    {
        return $this->belongsTo('App\FormasiJabatan');
    }
}