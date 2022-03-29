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
                    <form method = "POST" action="{{ url('AdminAkun') }}">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control">
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
                    </form>  
                </div>
                        {{-- Nama Lengkap    : <input type="text" name="nama_lengkap">
                        Username    : <input type="text" name="username">
                        Password    : <input type="text" name="password">
                        Status Akun : <input type="text" name="status_pengguna">
                        Kelas Akun  : <input type="text" name="id_kelas_pengguna"> --}}
                </div>
            </div>
    </section>
</div>
@endsection        


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Akun Anggota</title>
</head>
<body>
    <br>
    <h5>Tambah Akun Anggota</h5>
    <form method = "POST" action="{{ url('AdminAkun') }}">
    @csrf
    Nama Lengkap    : <input type="text" name="nama_lengkap"><br>
    Username    : <input type="text" name="username"><br>
    Password    : <input type="text" name="password"><br>
    Status Akun : <input type="text" name="status_pengguna"><br>
    Kelas Akun  : <input type="text" name="id_kelas_pengguna"><br><br>
    <br>
    <a class="btn btn-primary" href="/AdminAkun" role="button">Kembali</a>    
    <button type="submit" class="btn btn-primary">Tambahkan</button>
    
    </form>
</body>
</html>

<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}