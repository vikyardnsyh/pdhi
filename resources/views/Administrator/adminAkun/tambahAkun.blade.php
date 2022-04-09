@extends('layouts.administrator')
@section('title', 'Tambah Akun')
@section('sidebar')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Akun Dokter</h1>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Form Akun Dokter</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('AdminAkun') }}">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}">
                                @foreach($errors->get('nama_lengkap') as $msg)
                                    <p class="text-danger">{{$msg}}</p>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control">
                                @foreach($errors->get('username') as $msg)
                                    <p class="text-danger">{{$msg}}</p>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control" value="{{ old('password') }}">
                                @foreach($errors->get('password') as $msg)
                                    <p class="text-danger">{{$msg}}</p>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label>Kelas Akun</label>
                                <select name="id_kelas_pengguna" class="form-control">
                                    <option value="1">User</option>
                                    <option value="2">Admin</option>
                                </select>

                            </div>
                            <a class="btn btn-primary" href="/AdminAkun" role="button">Kembali</a>
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
