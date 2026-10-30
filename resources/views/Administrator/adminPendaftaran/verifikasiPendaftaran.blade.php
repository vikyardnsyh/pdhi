@extends('layouts.administrator')
@section('title', 'Verifikasi Pendaftaran')

@section('content')
@php
$berkasList = [
    ['title' => 'Pas Foto', 'jenis_berkas' => 'pas_foto', 'modalId' => 'pasFoto'],
    ['title' => 'Ijazah drh.', 'jenis_berkas' => 'ijazah', 'modalId' => 'ijazah'],
    ['title' => 'KTP', 'jenis_berkas' => 'ktp', 'modalId' => 'ktp'],
    ['title' => 'KTA', 'jenis_berkas' => 'kta', 'modalId' => 'kta'],
    ['title' => 'STRV', 'jenis_berkas' => 'strv', 'modalId' => 'strv'],
    ['title' => 'SKDHI', 'jenis_berkas' => 'skdhi', 'modalId' => 'skdhi'],
    ['title' => 'Bukti Tf. Pendaftaran', 'jenis_berkas' => 'tf_daftar', 'modalId' => 'tf_daftar'],
    ['title' => 'Bukti Tf. Keanggotaan', 'jenis_berkas' => 'tf_registrasi', 'modalId' => 'tf_registrasi'],
];
@endphp

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Verifikasi Pendaftaran</h1>
                <small class="text-muted">Periksa keabsahan biodata dan berkas persyaratan dokter</small>
            </div>
        </div>

        @foreach ($dataDokter as $key => $value)
        {{-- Section 1: Data Biodata Dokter --}}
        <div class="card card-primary shadow-sm mb-4">
            <div class="card-header border-bottom py-3">
                <h4 class="text-dark font-weight-bold mb-0">
                    <i class="fas fa-user-check text-primary mr-2"></i> Biodata Pendaftar: {{ $value->nama_lengkap }}
                </h4>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-12 col-md-6 form-group">
                        <label class="font-weight-600">Nama Lengkap (Gelar)</label>
                        <input readonly type="text" class="form-control bg-light" value="{{ $value->nama_lengkap ?? '-' }}">
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <label class="font-weight-600">Nama Panggilan</label>
                        <input readonly type="text" class="form-control bg-light" value="{{ $value->nama_panggilan ?? '-' }}">
                    </div>
                    <div class="col-12 col-md-4 form-group">
                        <label class="font-weight-600">Tempat Lahir</label>
                        <input readonly type="text" class="form-control bg-light" value="{{ $value->tempat_lahir ?? '-' }}">
                    </div>
                    <div class="col-12 col-md-4 form-group">
                        <label class="font-weight-600">Tanggal Lahir</label>
                        <input readonly type="text" class="form-control bg-light" value="{{ !empty($value->tanggal_lahir) ? date('d-M-Y', strtotime($value->tanggal_lahir)) : '-' }}">
                    </div>
                    <div class="col-12 col-md-4 form-group">
                        <label class="font-weight-600">Jenis Kelamin</label>
                        <input readonly type="text" class="form-control bg-light" value="{{ $value->jenis_kelamin ?? '-' }}">
                    </div>
                    <div class="col-12 col-md-4 form-group">
                        <label class="font-weight-600">Alumni</label>
                        <input readonly type="text" class="form-control bg-light" value="{{ $value->alumni ?? '-' }}">
                    </div>
                    <div class="col-12 col-md-4 form-group">
                        <label class="font-weight-600">Tahun Alumni</label>
                        <input readonly type="text" class="form-control bg-light" value="{{ $value->tahun_alumni ?? '-' }}">
                    </div>
                    <div class="col-12 col-md-4 form-group">
                        <label class="font-weight-600">Nama Pasangan</label>
                        <input readonly type="text" class="form-control bg-light" value="{{ $value->nama_pasangan ?? '-' }}">
                    </div>
                    <div class="col-12 form-group">
                        <label class="font-weight-600">Alamat Rumah</label>
                        <textarea readonly class="form-control bg-light" rows="2">{{ $value->alamat_rumah ?? '-' }}</textarea>
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <label class="font-weight-600">No. Telp / HP</label>
                        <input readonly type="text" class="form-control bg-light" value="{{ $value->no_telp ?? '-' }}">
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <label class="font-weight-600">Email</label>
                        <input readonly type="text" class="form-control bg-light" value="{{ $value->email ?? '-' }}">
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <label class="font-weight-600">Bidang Kerja</label>
                        <input readonly type="text" class="form-control bg-light" value="{{ $value->bidang_kerja ?? '-' }}">
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <label class="font-weight-600">Nama Klinik / Tempat Kerja</label>
                        <input readonly type="text" class="form-control bg-light" value="{{ $value->nama_klinik ?? '-' }}">
                    </div>
                    <div class="col-12 col-md-8 form-group">
                        <label class="font-weight-600">Alamat Klinik</label>
                        <input readonly type="text" class="form-control bg-light" value="{{ $value->alamat_klinik ?? '-' }}">
                    </div>
                    <div class="col-12 col-md-4 form-group">
                        <label class="font-weight-600">No. Telp / Fax Klinik</label>
                        <input readonly type="text" class="form-control bg-light" value="{{ $value->no_telp_klinik ?? '-' }}">
                    </div>
                </div>
            </div>
        </div>

        {{-- Section 2: Data Berkas Dokter (Dynamic Loop) --}}
        <div class="card card-primary shadow-sm mb-4">
            <div class="card-header border-bottom py-3">
                <h4 class="text-dark font-weight-bold mb-0">
                    <i class="fas fa-folder-open text-primary mr-2"></i> Dokumen Berkas Persyaratan
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($berkasList as $item)
                        @php
                            $namaBerkas = $dataBerkas->where('jenis_berkas', $item['jenis_berkas'])->pluck('nama_berkas')->first();
                            $isUploaded = !empty($namaBerkas);
                            $isPdf = $isUploaded && str_ends_with(strtolower($namaBerkas), '.pdf');
                            $imageSrc = $isUploaded
                                ? ($isPdf ? asset('img/no_image.jpg') : asset('img/berkas_dokter/' . $namaBerkas))
                                : asset('img/no_image.jpg');
                        @endphp
                        <div class="col-12 col-sm-6 col-lg-3 mb-4">
                            <div class="card border h-100 shadow-sm {{ $isUploaded ? 'border-success' : 'border-danger' }}">
                                <div class="card-header bg-light d-flex justify-content-between align-items-center py-2 px-3">
                                    <h6 class="mb-0 font-weight-bold text-dark text-small">{{ $item['title'] }}</h6>
                                    @if ($isUploaded)
                                        <span class="badge badge-success"><i class="fas fa-check"></i> Ada</span>
                                    @else
                                        <span class="badge badge-danger"><i class="fas fa-times"></i> Belum</span>
                                    @endif
                                </div>
                                <div class="card-body p-3 d-flex flex-column justify-content-between">
                                    <div class="text-center mb-2 p-2 bg-light rounded" style="min-height: 140px; display: flex; align-items: center; justify-content: center;">
                                        @if ($isUploaded && !$isPdf)
                                            <img src="{{ $imageSrc }}" alt="{{ $item['title'] }}" class="img-fluid rounded" style="max-height: 130px; object-fit: contain; cursor: pointer;" data-toggle="modal" data-target="#{{ $item['modalId'] }}">
                                        @elseif ($isUploaded && $isPdf)
                                            <div class="text-center py-3">
                                                <i class="fas fa-file-pdf fa-3x text-danger mb-1"></i>
                                                <div class="text-muted text-small">Format PDF</div>
                                            </div>
                                        @else
                                            <div class="text-center py-3 text-muted">
                                                <i class="fas fa-file-excel fa-2x mb-1 text-danger"></i>
                                                <div class="text-small">Belum diunggah</div>
                                            </div>
                                        @endif
                                    </div>

                                    @if ($isUploaded)
                                        <div class="d-flex justify-content-center gap-1">
                                            @if (!$isPdf)
                                                <button class="btn btn-sm btn-info mr-1" data-toggle="modal" data-target="#{{ $item['modalId'] }}" title="Perbesar">
                                                    <i class="fas fa-search-plus"></i> Lihat
                                                </button>
                                            @endif
                                            <form action="{{ url('adminPendaftaran/download') }}" method="GET" class="d-inline">
                                                @csrf
                                                <input type="hidden" value="{{ $namaBerkas }}" name="namaFile">
                                                <button class="btn btn-sm btn-success" type="submit" title="Unduh File">
                                                    <i class="fas fa-download"></i> Unduh
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Section 3: Status / Verifikasi Keanggotaan --}}
        @if (is_null($value->tanggal_terdaftar))
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="card card-success shadow-sm mb-5">
                        <div class="card-header border-bottom py-3">
                            <h4 class="text-success font-weight-bold mb-0">
                                <i class="fas fa-stamp mr-2"></i> Eksekusi Verifikasi Pendaftaran
                            </h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="alert alert-light border mb-4">
                                <i class="fas fa-check-circle text-success mr-1"></i>
                                <span>Isi data berikut untuk meresmikan keanggotaan dokter jika data biodata dan berkas telah lengkap dan sah.</span>
                            </div>

                            <form method="POST" action="{{ url('adminPendaftaran/' . $value->id) }}">
                                @csrf
                                <input type="hidden" name="_method" value="PATCH">

                                <div class="form-group mb-3">
                                    <label class="font-weight-600">Tanggal Terdaftar <span class="text-danger">*</span></label>
                                    <div class="input-group date" data-provide="datepicker" data-date-format="dd-mm-yyyy" data-date-autoclose="true">
                                        <input type="text" class="form-control" name="tanggal_terdaftar" value="{{ date('d-m-Y') }}" placeholder="Pilih tanggal">
                                        <div class="input-group-append" style="cursor: pointer;">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                    @foreach($errors->get('tanggal_terdaftar') as $msg)
                                        <div class="text-danger text-small mt-1">{{ $msg }}</div>
                                    @endforeach
                                </div>

                                <div class="form-group mb-3">
                                    <label class="font-weight-600">Masa Aktif <span class="text-danger">*</span></label>
                                    <select name="masa_aktif" class="form-control">
                                        <option value="4">4 Tahun (Standar Periode PDHI)</option>
                                        <option value="2">2 Tahun</option>
                                    </select>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="font-weight-600">Domisili Keanggotaan <span class="text-danger">*</span></label>
                                    <select name="domisili_anggota" class="form-control">
                                        <option value="Tetap">Anggota Tetap</option>
                                        <option value="Tamu">Anggota Tamu</option>
                                    </select>
                                </div>

                                <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                    <a class="btn btn-outline-secondary" href="{{ url('/adminPendaftaran') }}">
                                        <i class="fas fa-times mr-1"></i> Batal
                                    </a>
                                    <button type="submit" class="btn btn-success btn-lg">
                                        <i class="fas fa-check-double mr-1"></i> Verifikasi & Aktifkan Anggota
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-success border-0 shadow-sm d-flex align-items-center mb-5 p-3">
                <i class="fas fa-check-circle fa-2x mr-3"></i>
                <div>
                    <h5 class="mb-0 font-weight-bold">Dokter Ini Sudah Terverifikasi</h5>
                    <small>Terdaftar resmi sejak {{ date('d-M-Y', strtotime($value->tanggal_terdaftar)) }} dengan status Anggota {{ ucfirst($value->domisili_anggota) }}.</small>
                </div>
            </div>
        @endif

        @endforeach
    </section>
</div>

{{-- Modals for Image Preview --}}
@foreach ($berkasList as $item)
    @php
        $namaBerkas = $dataBerkas->where('jenis_berkas', $item['jenis_berkas'])->pluck('nama_berkas')->first();
    @endphp
    @if (!empty($namaBerkas) && !str_ends_with(strtolower($namaBerkas), '.pdf'))
        <div class="modal fade" id="{{ $item['modalId'] }}" tabindex="-1" aria-labelledby="{{ $item['modalId'] }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content shadow border-0">
                    <div class="modal-header bg-light py-2 px-3">
                        <h5 class="modal-title font-weight-bold text-dark" id="{{ $item['modalId'] }}Label">
                            <i class="fas fa-file-image mr-1 text-primary"></i> {{ $item['title'] }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center p-3">
                        <img src="{{ asset('img/berkas_dokter/' . $namaBerkas) }}" class="img-fluid rounded shadow-sm" alt="{{ $item['title'] }}" style="max-height: 75vh;">
                    </div>
                    <div class="modal-footer py-2 px-3 justify-content-between">
                        <form action="{{ url('adminPendaftaran/download') }}" method="GET">
                            @csrf
                            <input type="hidden" value="{{ $namaBerkas }}" name="namaFile">
                            <button class="btn btn-sm btn-success" type="submit">
                                <i class="fas fa-download mr-1"></i> Unduh File
                            </button>
                        </form>
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach

@endsection
