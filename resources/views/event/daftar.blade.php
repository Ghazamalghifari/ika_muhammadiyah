@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li> 
<li class="active">Event</li>
</ul> 

<div class="panel panel-default">
<div class="panel-body">

@if(Auth::user()->status == 'admin')
{!! Form::open(['url' =>  route('event.store'),'method' => 'post', 'class'=>'form-horizontal']) !!}

		{!! Form::hidden('id_event', $value = $id, ['class'=>'form-control']) !!}   

				{!! Form::submit('Daftar', ['class'=>'btn btn-primary  btn-block']) !!} 

{!! Form::close() !!}
@endif

</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Event</h2>
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
