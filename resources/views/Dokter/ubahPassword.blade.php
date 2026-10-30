@extends('layouts.pengguna')
@section('title', 'Ubah Password')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Ubah Password</h1>
                <small class="text-muted">Perbarui kata sandi akun Anda untuk keamanan berkala</small>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card card-primary shadow-sm">
                    <div class="card-header border-bottom py-3">
                        <h4 class="text-dark font-weight-bold mb-0">
                            <i class="fas fa-key text-primary mr-2"></i> Formulir Pengubahan Kata Sandi
                        </h4>
                    </div>

                    <div class="card-body p-4">
                        <form method="POST" action="{{ url('ubahPassword/' . $username) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">

                            <div class="form-group mb-3">
                                <label for="password" class="font-weight-600">Password Saat Ini <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input name="password_saat_ini" id="password" type="password" class="form-control @error('password_saat_ini') is-invalid @enderror" placeholder="Masukkan password lama" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" data-target="#password" onclick="togglePasswordVisibility(this)" title="Lihat / Sembunyikan Password">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                @foreach($errors->get('password_saat_ini') as $msg)
                                    <div class="invalid-feedback d-block">{{ $msg }}</div>
                                @endforeach
                            </div>

                            <div class="form-group mb-3">
                                <label for="password2" class="font-weight-600">Password Baru <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input name="password_baru" id="password2" type="password" class="form-control @error('password_baru') is-invalid @enderror" placeholder="Minimal 6 karakter" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" data-target="#password2" onclick="togglePasswordVisibility(this)" title="Lihat / Sembunyikan Password">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                @foreach($errors->get('password_baru') as $msg)
                                    <div class="invalid-feedback d-block">{{ $msg }}</div>
                                @endforeach
                            </div>

                            <div class="form-group mb-4">
                                <label for="konfirmasi_password_baru" class="font-weight-600">Konfirmasi Password Baru <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-check-double"></i></span>
                                    </div>
                                    <input name="konfirmasi_password_baru" id="konfirmasi_password_baru" type="password" class="form-control @error('konfirmasi_password_baru') is-invalid @enderror" placeholder="Ulangi password baru" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" data-target="#konfirmasi_password_baru" onclick="togglePasswordVisibility(this)" title="Lihat / Sembunyikan Password">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                @foreach($errors->get('konfirmasi_password_baru') as $msg)
                                    <div class="invalid-feedback d-block">{{ $msg }}</div>
                                @endforeach
                            </div>

                            <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                                <a href="{{ url('/') }}" class="btn btn-outline-secondary mr-2">
                                    <i class="fas fa-arrow-left mr-1"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-1"></i> Simpan Password Baru
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
