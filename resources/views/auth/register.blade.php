@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Anggota Alumni</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="off" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Alamat Email</label>

                            <div class="col-md-6">
                                <input id="email" autocomplete="off" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
                            <label for="jenis_kelamin" class="col-md-4 control-label">Jenis Kelamin</label>

                            <div class="col-md-6">
                                 

                                 {!! Form::select('jenis_kelamin', ['Laki-Laki'=>'Laki-Laki','Perempuan'=>'Perempuan'],null,['class'=>'form-control js-selectize', 'placeholder' => 'Pilih Jenis Kelamin']) !!}

                                @if ($errors->has('jenis_kelamin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('id_angkatan') ? ' has-error' : '' }}">
                            <label for="id_angkatan" class="col-md-4 control-label">Angkatan</label>

                            <div class="col-md-6">
                                
                                 {!! Form::select('id_angkatan', []+App\Angkatan::pluck('nama_angkatan','id')->all(), null,['class'=>'form-control js-selectize', 'placeholder' => 'Pilih Angkatan']) !!}     

                                @if ($errors->has('id_angkatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_angkatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kontak') ? ' has-error' : '' }}">
                            <label for="kontak" class="col-md-4 control-label">Kontak</label>

                            <div class="col-md-6">
                                <input id="kontak" type="text" class="form-control"  autocomplete="off"name="kontak" value="{{ old('kontak') }}" required>

                                @if ($errors->has('kontak'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kontak') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kategori_kontak') ? ' has-error' : '' }}">
                            <label for="kategori_kontak" class="col-md-4 control-label">Kategori Kontak</label>

                            <div class="col-md-6">
                                 

                            {!! Form::select('kategori_kontak',['Tidak Ada'=>'Tidak Ada','BBM'=>'BBM','Instagram'=>'Instagram','Line'=>'Line','Facebook'=>'Facebook','Nomor Telefone'=>'Nomor Telefone'],null,['class'=>'form-control js-selectize', 'placeholder' => 'Pilih Kategori Kontak']) !!}

                                @if ($errors->has('kategori_kontak'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kategori_kontak') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pemilik_kontak') ? ' has-error' : '' }}">
                            <label for="pemilik_kontak" class="col-md-4 control-label">Pemilik Kontak</label>

                            <div class="col-md-6">
                                
                            {!! Form::select('pemilik_kontak',['Tidak Ada'=>'Tidak Ada','Pribadi'=>'Pribadi','Ibu'=>'Ibu','Ayah'=>'Ayah'],null,['class'=>'form-control js-selectize', 'placeholder' => 'Pilih Pemilik Kontak']) !!}

                                @if ($errors->has('pemilik_kontak'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pemilik_kontak') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" autocomplete="off" name="alamat" value="{{ old('alamat') }}" required>

                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Konfirmasi Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Daftar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
