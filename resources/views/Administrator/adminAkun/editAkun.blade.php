@extends('layouts.administrator')
@section('title', 'Edit Akun')
@section('sidebar')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Akun Pengguna</h1>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Detail Akun Pengguna</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('AdminAkun/' . $penggunaBaru->username) }}">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="_method" value="PATCH">
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" value="{{ $dokterBaru->nama_lengkap }}"
                                class="form-control">
                                @foreach($errors->get('nama_lengkap') as $msg)
                                    <p class="text-danger">{{$msg}}</p>
                                @endforeach
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" value="{{ $penggunaBaru->username }}"
                                class="form-control">
                                @foreach($errors->get('username') as $msg)
                                    <p class="text-danger">{{$msg}}</p>
                                @endforeach
                        </div>
                        <div class="form-group">
                            <label>Status Akun</label>
                            <select name="status_pengguna" id="" class="form-control">
                                <option
                                    {{ old('status_pengguna', $penggunaBaru->status_pengguna) == '1' ? 'selected' : '' }}
                                    value="1">Aktif</option>
                                <option
                                    {{ old('status_pengguna', $penggunaBaru->status_pengguna) == '2' ? 'selected' : '' }}
                                    value="2">Non Aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kelas Akun</label>
                            <select name="id_kelas_pengguna" id="" class="form-control">
                                <option
                                    {{ old('status_pengguna', $penggunaBaru->id_kelas_pengguna) == '1' ? 'selected' : '' }}
                                    value="1">User</option>
                                <option
                                    {{ old('status_pengguna', $penggunaBaru->id_kelas_pengguna) == '2' ? 'selected' : '' }}
                                    value="2">Admin</option>
                            </select>
                        </div>
                        <br>
                        <a class="btn btn-primary" href="/AdminAkun" role="button">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
