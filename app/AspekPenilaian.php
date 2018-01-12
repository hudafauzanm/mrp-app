<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AspekPenilaian extends Model
{
    protected $table = 'aspek_penilaian';

    public function penilaian_pegawai()
    {
    	return $this->hasMany('App/PenilaianPegawai');
    }
}
