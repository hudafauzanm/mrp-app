<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey='id';
    public $incrementing = false;

    protected $hidden = [
        'id', 'password', 'user_role'
    ];
    

    public function formasi_jabatan()
    {
    	return $this->belongsTo('App\FormasiJabatan');
    }

    public function diklat_penjenjangan()
    {
    	return $this->hasMany('App\DiklatPenjenjangan');
    }

    public function mrp()
    {
    	return $this->hasMany('App\MRP');
    }

    public function penilaian_pegawai()
    {
        return $this->hasMany('App\PenilaianPegawai');
    }

    public function time_diff($dari, $ke)
    {
        return $dari->diff($ke)->format('%y tahun, %m bulan, %d hari');
    }
}
