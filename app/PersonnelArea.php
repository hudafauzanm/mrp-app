<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonnelArea extends Model
{
    protected $table = 'personnel_area';

    public function direktorat()
    {
    	return $this->belongsTo('App\Direktorat');
    }

    public function formasi_jabatan()
    {
    	return $this->hasMany('App\FormasiJabatan');
    }
}
