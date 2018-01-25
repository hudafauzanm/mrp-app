<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenilaianPegawai extends Model
{
    protected $table = 'penilaian_pegawai';
    protected $guarded = ['id'];

    public function aspek_penilaian()
    {
    	return $this->belongsTo('App\AspekPenilaian');
    }

    public function mrp()
    {
        return $this->hasOne('App\MRP', 'mrp_id');
    }

    public function pegawai()
    {
    	return $this->belongsTo('App\Pegawai');
    }
}
