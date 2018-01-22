<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PersonnelArea extends Authenticatable
{
    use Notifiable;

    protected $table = 'personnel_area';
    protected $primaryKey = 'id';
    public $incrementing = false;

    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
          parent::setAttribute($key, $value);
        }
    }

    public function direktorat()
    {
    	return $this->belongsTo('App\Direktorat');
    }

    public function formasi_jabatan()
    {
    	return $this->hasMany('App\FormasiJabatan');
    }
}
