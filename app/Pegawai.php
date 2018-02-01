<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
    	return $this->hasMany('App\DiklatPenjenjangan')->latest();
    }

    public function mrp()
    {
    	return $this->hasMany('App\MRP');
    }

    public function penilaian_pegawai()
    {
        return $this->hasMany('App\PenilaianPegawai');
    }

    public function sutri()
    {
        return $this->belongsTo('App\Pegawai', 'nip_sutri', 'nip');
    }

    public function time_diff($dari, $ke)
    {
        Carbon::parse($dari);
        Carbon::parse($ke);
        return $dari->diff($ke)->format('%y tahun, %m bulan, %d hari');
    }

    public function year_diff_decimal($dari, $ke)
    {
        Carbon::parse($dari);
        Carbon::parse($ke);
        return round($dari->diffInMonths($ke)/12, 2);
    }
}
