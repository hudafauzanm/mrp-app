<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direktorat extends Model
{
    protected $table = 'direktorat';
    protected $primaryKey='id';
    public $incrementing = false;

    public function personnel_area()
    {
    	return $this->hasMany('App\PersonnelArea');
    }
}
