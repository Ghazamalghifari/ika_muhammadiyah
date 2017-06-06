<div class="form-group{{ $errors->has('id_angkatan') ? ' has-error' : '' }}">
{!! Form::label('id_angkatan', 'Angkatan', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-3">
{!! Form::select('id_angkatan', []+App\Angkatan::pluck('nama_angkatan','id')->all(), null,['class'=>'form-control js-selectize', 'placeholder' => 'Pilih Angkatan']) !!}  
{!! $errors->first('id_angkatan', '<p class="help-block">:message</p>') !!}
</div> 
 
<div class="form-group{{ $errors->has('id_user') ? ' has-error' : '' }}">
{!! Form::label('id_user', 'Ketua Angkatan', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-3">
{!! Form::select('id_user', []+App\Alumni::pluck('name','id')->all(), null,['class'=>'form-control js-selectize', 'placeholder' => 'Pilih Ketua Angkatan']) !!}  
{!! $errors->first('id_user', '<p class="help-block">:message</p>') !!}
</div> 

{!! Form::submit('Simpan', ['class'=>'btn btn-primary ']) !!}
</div>
</div>
