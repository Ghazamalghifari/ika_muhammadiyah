<div class="row">
	<div class="form-group{{ $errors->has('nama_event') ? ' has-error' : '' }}">
	{!! Form::label('nama_event', 'Nama Event', ['class'=>'col-md-1 control-label']) !!}
	<div class="col-md-4">
	{!! Form::text('nama_event', null, ['class'=>'form-control']) !!}
	{!! $errors->first('nama_event', '<p class="help-block">:message</p>') !!}
	</div> 
	 
	<div class="form-group{{ $errors->has('tanggal_event') ? ' has-error' : '' }}">
	{!! Form::label('tanggal_event', 'Tanggal Event', ['class'=>'col-md-1 control-label']) !!}
	<div class="col-md-2">
	{!! Form::date('tanggal_event', null, ['class'=>'form-control']) !!}
	{!! $errors->first('tanggal_event', '<p class="help-block">:message</p>') !!}
	</div> 

	<div class="form-group{{ $errors->has('waktu_event') ? ' has-error' : '' }}">
	{!! Form::label('waktu_event', 'Waktu Event', ['class'=>'col-md-1 control-label']) !!}
	<div class="col-md-2">
	{!! Form::time('waktu_event', null, ['class'=>'form-control']) !!}
	{!! $errors->first('waktu_event', '<p class="help-block">:message</p>') !!}
	</div> 
</div>

<div class="row">
	 
	<div class="form-group{{ $errors->has('keterangan_event') ? ' has-error' : '' }}">
	{!! Form::label('keterangan_event', 'Keterangan Event', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-6">
	{!! Form::text('keterangan_event', null, ['class'=>'form-control']) !!}
	{!! $errors->first('keterangan_event', '<p class="help-block">:message</p>') !!}
	</div> 
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary btn']) !!}
</div>

<div class="row">
	<div class="col-md-12">
	<div class="form-group">
	</div>
	</div>
</div>
</div>
</div>
