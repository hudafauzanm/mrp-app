<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PersonnelArea extends Authenticatable
{
    protected $table = 'personnel_area';
    protected $primaryKey = 'id';
    public $incrementing = false;

    public function direktorat()
    {
    	return $this->belongsTo('App\Direktorat');
    }

    public function formasi_jabatan()
    {
    	return $this->hasMany('App\FormasiJabatan');
    }
}
