<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormasiJabatan extends Model
{
    protected $table = 'personnel_area';

    public function personnel_area()
    {
    	return $this->belongsTo('App\PersonnelArea');
    }
}
