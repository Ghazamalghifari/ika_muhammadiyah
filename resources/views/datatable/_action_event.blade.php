@if(Auth::user()->status == 'admin')

{!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message]) !!} 
<a href="{{ $edit_url }}" class="btn btn-sm btn-warning">Edit</a> |
<a href="{{ $show_url }}" class="btn btn-sm btn-warning">Daftar</a> 
{!! Form::submit('Hapus',['class'=>'btn btn-sm btn-danger']) !!}
{!! Form::close() !!}
@else(Auth::user()->status == 'member')

@endif