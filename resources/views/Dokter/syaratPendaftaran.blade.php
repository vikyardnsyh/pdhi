@extends('layouts.pengguna')
@section('title', 'Syarat Pendaftaran Anggota')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Syarat Pendaftaran</h1>
                <small class="text-muted">Ketentuan & Persyaratan Pendaftaran Anggota PDHI Cabang Banten II</small>
            </div>
        </div>

        <div class="section-body">
            {{-- Official Letterhead Card --}}
            <div class="card card-primary shadow-sm mb-4">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-3 text-center mb-3 mb-md-0">
                            <img src="{{ asset('img/pdhi_logo.jpg') }}" width="110" height="110" alt="Logo PDHI" class="rounded-circle shadow-sm">
                        </div>
                        <div class="col-12 col-md-9 text-center text-md-left">
                            <h5 class="text-dark font-weight-bold mb-1">PERHIMPUNAN DOKTER HEWAN INDONESIA</h5>
                            <h6 class="text-muted font-weight-bold mb-1">INDONESIAN VETERINARY MEDICAL ASSOCIATION</h6>
                            <h5 class="text-primary font-weight-bold mb-2">CABANG BANTEN II</h5>
                            <p class="text-muted text-small mb-1">
                                Sekretariat: Boulevard Orlin Arcade 2, JB03 Lt. 2 Graha Raya, Paku Jaya - Tangerang Selatan
                            </p>
                            <div class="text-small">
                                <span class="mr-3"><i class="fab fa-whatsapp text-success mr-1"></i> 0878-7101-7429</span>
                                <span class="mr-3"><i class="fas fa-envelope text-primary mr-1"></i> pdhicabangbanten2@gmail.com</span>
                                <span><i class="fas fa-globe text-info mr-1"></i> <a href="https://banten2.pdhi.or.id/" target="_blank">banten2.pdhi.or.id</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Requirements Grid: Anggota Tetap vs Anggota Tamu --}}
            <div class="row">
                {{-- Anggota Tetap --}}
                <div class="col-12 col-lg-6 mb-4">
                    <div class="card h-100 shadow-sm border" style="border-top: 4px solid #47c363 !important;">
                        <div class="card-header bg-light d-flex justify-content-between align-items-center py-3">
                            <h5 class="font-weight-bold text-success mb-0">
                                <i class="fas fa-user-check mr-2"></i> ANGGOTA TETAP
                            </h5>
                            <span class="badge badge-success">Domisili Banten</span>
                        </div>
                        <div class="card-body p-4">
                            <ol class="pl-3 mb-3 text-dark" style="line-height: 1.8;">
                                <li>Mengisi formulir keanggotaan lengkap.</li>
                                <li>Melampirkan fotocopy ijazah Dokter Hewan yang dilegalisir (1 lembar).</li>
                                <li>Melampirkan 2 lembar pas foto berwarna 4x6 (ketentuan: laki-laki berlatar belakang <strong>MERAH</strong>, perempuan berlatar belakang <strong>BIRU MUDA</strong>, tidak dirusak/stapler).</li>
                                <li>Melampirkan fotocopy KTP (1 lembar).</li>
                                <li>Melampirkan fotocopy KTA online PDHI Pusat.</li>
                                <li>Melampirkan fotocopy STRV (1 lembar).</li>
                                <li>Melampirkan fotocopy SKDHI (1 lembar).</li>
                                <li>Membayar uang pendaftaran sebesar <strong>Rp. 100.000,-</strong></li>
                                <li>Membayar iuran keanggotaan selama 4 tahun sebesar <strong>Rp. 1.200.000,-</strong> (Rp. 300.000,- / tahun).</li>
                            </ol>

                            <div class="alert alert-light border rounded p-3 text-small">
                                <i class="fas fa-university text-primary mr-1"></i> <strong>Rekening Pembayaran:</strong><br>
                                Bank BCA: <strong>8330011981</strong> a.n. <strong>Ida Rosmaida</strong><br>
                                <small class="text-muted">Simpan dan unggah bukti transfer ke sistem pada menu Upload Berkas.</small>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Anggota Tamu --}}
                <div class="col-12 col-lg-6 mb-4">
                    <div class="card h-100 shadow-sm border" style="border-top: 4px solid #ffa426 !important;">
                        <div class="card-header bg-light d-flex justify-content-between align-items-center py-3">
                            <h5 class="font-weight-bold text-warning mb-0">
                                <i class="fas fa-user-clock mr-2"></i> ANGGOTA TAMU
                            </h5>
                            <span class="badge badge-warning">Luar Domisili</span>
                        </div>
                        <div class="card-body p-4">
                            <ol class="pl-3 mb-3 text-dark" style="line-height: 1.8;">
                                <li>Mengisi formulir keanggotaan lengkap.</li>
                                <li>Melampirkan fotocopy ijazah Dokter Hewan yang dilegalisir (1 lembar).</li>
                                <li>Melampirkan 2 lembar pas foto berwarna 4x6 (ketentuan: laki-laki berlatar belakang <strong>MERAH</strong>, perempuan berlatar belakang <strong>BIRU MUDA</strong>, tidak dirusak/stapler).</li>
                                <li>Melampirkan fotocopy KTP (1 lembar).</li>
                                <li>Melampirkan fotocopy KTA online PDHI Pusat.</li>
                                <li>Melampirkan fotocopy STRV (1 lembar).</li>
                                <li>Melampirkan fotocopy SKDHI (1 lembar).</li>
                                <li>Membayar iuran keanggotaan selama 4 tahun sebesar <strong>Rp. 2.000.000,-</strong> (Rp. 500.000,- / tahun).</li>
                            </ol>

                            <div class="alert alert-light border rounded p-3 text-small">
                                <i class="fas fa-university text-primary mr-1"></i> <strong>Rekening Pembayaran:</strong><br>
                                Bank BCA: <strong>8330011981</strong> a.n. <strong>Ida Rosmaida</strong><br>
                                <small class="text-muted">Simpan dan unggah bukti transfer ke sistem pada menu Upload Berkas.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
