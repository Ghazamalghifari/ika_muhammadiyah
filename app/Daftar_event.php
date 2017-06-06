<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daftar_event extends Model
{
    //
    protected $fillable = ['id','id_event','id_user','keterangan_pendaftaran','status_pendaftaran'];

    public function event()
	{
	  return $this->belongsTo('App\Event','id_event');
	}


    public function alumni()
	{
	  return $this->belongsTo('App\Alumni','id_user');
	}

}
