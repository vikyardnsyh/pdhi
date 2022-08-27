@extends('layouts.pengguna')
@section('title', 'Ubah Password')
@section('sidebar')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Ubah Password</h1>
        </div>
        <div class="row justify-content-center">
            <div class="card col-6 col-md-6 col-lg-7 card-primary">
                <div class="card-header mb-2">
                    <h4>Form Ubah Password</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('ubahPassword/' . $username) }}">
                        @csrf
                        <div class="form-group mt-n4">
                            <input type="hidden" name="_method" value="PATCH">
                        </div>
                        <div class="form-group">
                            <label>Password Saat Ini</label>
                            <div class="input-group">
                                <input name="password_saat_ini" id="password" type="password" class="form-control" value="{{ old('password_saat_ini') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" onclick="showhide()" data-toggle="tooltip" data-placement="top" title data-original-title="Lihat / Sembunyikan Password"><i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            @foreach($errors->get('password_saat_ini') as $msg)
                            <p class="text-danger">{{$msg}}</p>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label>Password Baru</label>
                            <div class="input-group">
                                <input name="password_baru" id="password2" type="password" class="form-control" value="{{ old('password_baru') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" onclick="showhide2()" data-toggle="tooltip" data-placement="top" title data-original-title="Lihat / Sembunyikan Password"><i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            @foreach($errors->get('password_baru') as $msg)
                            <p class="text-danger">{{$msg}}</p>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password Baru</label>
                            <div class="input-group">
                                <input name="konfirmasi_password_baru" id="konfirmasi_password_baru" type="password" class="form-control" value="{{ old('konfirmasi_password_baru') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" onclick="showhide22()" data-toggle="tooltip" data-placement="top" title data-original-title="Lihat / Sembunyikan Password"><i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            @foreach($errors->get('konfirmasi_password_baru') as $msg)
                            <p class="text-danger">{{$msg}}</p>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection