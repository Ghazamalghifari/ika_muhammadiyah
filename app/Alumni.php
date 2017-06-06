<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    //

    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password','id_angkatan','jenis_kelamin','kontak','kategori_kontak','pemilik_kontak','alamat'];

    public function angkatan()
	{
	  return $this->belongsTo('App\Angkatan','id_angkatan');
	}
}
