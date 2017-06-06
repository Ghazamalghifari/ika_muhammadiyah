<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ketua_ika extends Model
{
    //
    protected $fillable = ['id','id_angkatan','id_user'];

    public function angkatan()
	{
	  return $this->belongsTo('App\Angkatan','id_angkatan');
	}

    public function alumni()
	{
	  return $this->belongsTo('App\Alumni','id_user');
	}
}
