@extends('layouts.administrator')
@section('title', 'Tambah Akun Pengguna')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Tambah Akun</h1>
                <small class="text-muted">Buat akun akses baru untuk dokter atau administrator</small>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card card-primary shadow-sm">
                    <div class="card-header border-bottom py-3">
                        <h4 class="text-dark font-weight-bold mb-0">
                            <i class="fas fa-user-plus text-primary mr-2"></i> Formulir Akun Baru
                        </h4>
                    </div>

                    <div class="card-body p-4">
                        <form method="POST" action="{{ url('AdminAkun') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label class="font-weight-600">Nama Lengkap Dokter <span class="text-danger">*</span></label>
                                <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap') }}" placeholder="Contoh: Dr. drh. Budi Setiawan" required>
                                @foreach($errors->get('nama_lengkap') as $msg)
                                    <div class="invalid-feedback d-block">{{ $msg }}</div>
                                @endforeach
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-600">Username <span class="text-danger">*</span></label>
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Contoh: budisetiawan" required>
                                @foreach($errors->get('username') as $msg)
                                    <div class="invalid-feedback d-block">{{ $msg }}</div>
                                @endforeach
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-600">Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Masukkan password" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" data-target="#password" onclick="togglePasswordVisibility(this)" title="Lihat / Sembunyikan Password">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                @foreach($errors->get('password') as $msg)
                                    <div class="invalid-feedback d-block">{{ $msg }}</div>
                                @endforeach
                            </div>

                            <div class="form-group mb-4">
                                <label class="font-weight-600">Hak Akses Kelas Akun <span class="text-danger">*</span></label>
                                <select name="id_kelas_pengguna" class="form-control">
                                    <option value="1" {{ old('id_kelas_pengguna') == '1' ? 'selected' : '' }}>User (Dokter Hewan)</option>
                                    <option value="2" {{ old('id_kelas_pengguna') == '2' ? 'selected' : '' }}>Admin (Pengurus PDHI)</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                <a class="btn btn-outline-secondary" href="{{ url('/AdminAkun') }}">
                                    <i class="fas fa-times mr-1"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-1"></i> Tambahkan Akun
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
