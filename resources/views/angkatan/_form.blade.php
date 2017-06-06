<div class="form-group{{ $errors->has('nama_angkatan') ? ' has-error' : '' }}">
{!! Form::label('nama_angkatan', 'Angkatan', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-3">
{!! Form::text('nama_angkatan', null, ['class'=>'form-control']) !!}
{!! $errors->first('nama_angkatan', '<p class="help-block">:message</p>') !!}
</div> 
 
{!! Form::submit('Simpan', ['class'=>'btn btn-primary ']) !!}
</div>
</div>
