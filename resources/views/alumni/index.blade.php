@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li> 
<li class="active">Anggota Alumni</li>
</ul> 


<div class="panel panel-default">
<div class="panel-body">

<div class="btn-group">
  <button type="button" class="btn btn-primary">Angkatan</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="{{ url('/data/alumni') }}">All</a></li>
 	 @foreach($angkatan as $angkatans)
    <li><a href="{{ route('alumni.filter_angkatan',$angkatans->id) }}">{{ $angkatans->nama_angkatan }}</a></li>
	@endforeach 
  </ul>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Anggota Alumni</h2>
</div>

<div class="panel-body">
<div class="table-responsive">
{!! $html->table(['class'=>'table-striped table']) !!}
</div>

</div>
</div>
</div>
</div>
</div>
@endsection

@section('scripts')
{!! $html->scripts() !!}
@endsection
