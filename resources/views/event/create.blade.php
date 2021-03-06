@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li> 
<li><a href="{{ url('/data/event') }}">Event</a></li>
<li class="active">Tambah Event</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Tambah Event</h2>
</div>
<div class="panel-body">
{!! Form::open(['url' => route('event.store'),
'method' => 'post', 'class'=>'form-horizontal']) !!}
@include('event._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection
