@extends('layouts.administrator')
@section('title', 'Edit Data Akun')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Edit Data Akun</h1>
                <small class="text-muted">Perbarui status aktif atau hak akses akun pengguna</small>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card card-primary shadow-sm">
                    <div class="card-header border-bottom py-3">
                        <h4 class="text-dark font-weight-bold mb-0">
                            <i class="fas fa-user-edit text-primary mr-2"></i> Pengaturan Akun: {{ $penggunaBaru->username }}
                        </h4>
                    </div>

                    <div class="card-body p-4">
                        <form method="POST" action="{{ url('AdminAkun/' . $penggunaBaru->username) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">

                            <div class="form-group mb-3">
                                <label class="font-weight-600">Nama Lengkap Dokter <span class="text-danger">*</span></label>
                                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $dokterBaru->nama_lengkap) }}" class="form-control @error('nama_lengkap') is-invalid @enderror" required>
                                @foreach($errors->get('nama_lengkap') as $msg)
                                    <div class="invalid-feedback d-block">{{ $msg }}</div>
                                @endforeach
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-600">Username <span class="text-danger">*</span></label>
                                <input type="text" name="username" value="{{ old('username', $penggunaBaru->username) }}" class="form-control @error('username') is-invalid @enderror" required>
                                @foreach($errors->get('username') as $msg)
                                    <div class="invalid-feedback d-block">{{ $msg }}</div>
                                @endforeach
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-600">Status Keaktifan Akun <span class="text-danger">*</span></label>
                                <select name="status_pengguna" class="form-control">
                                    <option {{ old('status_pengguna', $penggunaBaru->status_pengguna) == '1' ? 'selected' : '' }} value="1">Aktif (Dapat Login)</option>
                                    <option {{ old('status_pengguna', $penggunaBaru->status_pengguna) == '2' ? 'selected' : '' }} value="2">Non Aktif (Akses Ditutup)</option>
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label class="font-weight-600">Kelas / Hak Akses Akun <span class="text-danger">*</span></label>
                                <select name="id_kelas_pengguna" class="form-control">
                                    <option {{ old('id_kelas_pengguna', $penggunaBaru->id_kelas_pengguna) == '1' ? 'selected' : '' }} value="1">User (Dokter Hewan)</option>
                                    <option {{ old('id_kelas_pengguna', $penggunaBaru->id_kelas_pengguna) == '2' ? 'selected' : '' }} value="2">Admin (Pengurus PDHI)</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                <a class="btn btn-outline-secondary" href="{{ url('/AdminAkun') }}">
                                    <i class="fas fa-times mr-1"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-1"></i> Simpan Perubahan
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
