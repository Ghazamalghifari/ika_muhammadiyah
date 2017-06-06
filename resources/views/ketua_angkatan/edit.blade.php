@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li> 
<li><a href="{{ url('/admin/angkatan') }}" Ketua>Angkatan</a></li>
<li class="active">Edit Ketua Angkatan</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Edit Ketua Angkatan</h2>
</div>
<div class="panel-body">
{!! Form::model($ketua_angkatan, ['url' => route('ketua_angkatan.update', $ketua_angkatan->id), 'method' => 'put', 'files'=>'true', 'class'=>'form-horizontal']) !!}
@include('ketua_angkatan._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection
