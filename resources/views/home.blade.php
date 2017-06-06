@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-4 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Detail Ika Muhammadiyah</div>

                <div class="panel-body">
                   Jumlah Anggota : {!! $keterangan->jumlah_anggota !!} <br>
                   Jumlah Angkatan : {!! $keterangan->jumlah_angkatan !!} <br>
                   Jumlah Event : {!! $keterangan->jumlah_event !!} <br><br> <br><br><br>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Ketua Angkatan :</div>

                <div class="panel-body">

              @foreach($ketua_angkatan as $ketua_angkatans)
                 {{ $ketua_angkatans->angkatan->nama_angkatan }} . {{ $ketua_angkatans->alumni->name }} <br>
              @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Event Alumni Sdit Muhammadiyah</div>

            </div>
        </div>


       @foreach($event as $events) 
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                <b> {{ $events->nama_event }}</b>
                <p>Tanggal : {{ $events->tanggal_event }}, Waktu : {{ $events->waktu_event }}</p>
                <p>Keterangan : {{ $events->keterangan_event }}.</p>
                </div>
            </div>
        </div> 
       @endforeach   
    </div>
</div>
@endsection
