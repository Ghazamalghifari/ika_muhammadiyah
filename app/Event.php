<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = ['id','nama_event','tanggal_event','waktu_event','keterangan_event','status_event'];
}
