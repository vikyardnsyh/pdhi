@extends('layouts.administrator')
@section('title', 'Verifikasi Pendaftaran')
@section('sidebar')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Verifikasi Pendaftaran</h1>
        </div>
        <div class="row justify-content-center">
            <div class="card col-12 col-md-6 col-lg-10 card-primary">
                <div class="card-header">
                    <h4>Form Registrasi Dokter</h4>
                </div>
                <div class="card-body">
                    @foreach ($dataDokter as $key => $value)
                    <div class="form-group">
                        <span class="mb-2">Kolom dengan tanda * wajib terisi</span>
                        <div class="form-group">
                            <label class="mt-3">Nama Lengkap (Dengan Gelar Sesuai KTA)</label><span class="text-danger">*</span>
                            <input readonly type="text" class="form-control" placeholder="-" name="nama_panggilan" value="{{ $value->nama_lengkap }}">
                        </div>
                        <div class="form-group">
                            <label>Nama Panggilan</label><span class="text-danger">*</span>
                            <input readonly type="text" class="form-control" placeholder="-" name="nama_panggilan" value="{{ $value->nama_panggilan }}">
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label><span class="text-danger">*</span>
                            <input readonly type="text" class="form-control" placeholder="-" name="tempat_lahir" value="{{ $value->tempat_lahir }}">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label><span class="text-danger">*</span>
                            <div class="input-group">
                                <input readonly type="text" class="form-control" name="tanggal_lahir" value="{{ date('d-M-Y', strtotime($value->tanggal_lahir)) }}" placeholder="-">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label><span class="text-danger">*</span>
                            <input readonly type="text" class="form-control" placeholder="-" name="jenis_kelamin" value="{{ $value->jenis_kelamin }}">
                        </div>
                        <div class="form-group">
                            <label>Alumni</label><span class="text-danger">*</span>
                            <input readonly type="text" class="form-control" placeholder="-" name="alumni" value="{{ $value->alumni }}">
                        </div>
                        <div class="form-group">
                            <label>Tahun Alumni</label><span class="text-danger">*</span>
                            <input readonly type="text" class="form-control" placeholder="-" name="tahun_alumni" value="{{ $value->tahun_alumni }}">
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap Pasangan</label>
                            <input readonly type="text" class="form-control" placeholder="-" name="nama_pasangan" value="{{ $value->nama_pasangan }}">
                        </div>
                        <div class="form-group">
                            <label>Alamat Rumah</label><span class="text-danger">*</span>
                            <input readonly type="text" class="form-control" placeholder="-" name="alamat_rumah" value="{{ $value->alamat_rumah }}">
                        </div>
                        <div class="form-group">
                            <label>No. Telp / HP</label><span class="text-danger">*</span>
                            <input readonly type="text" class="form-control" placeholder="-" name="no_telp" value="{{ $value->no_telp }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label><span class="text-danger">*</span>
                            <input readonly type="text" class="form-control" placeholder="-" name="email" value="{{ $value->email }}">
                        </div>
                        <div class="form-group">
                            <label>Bidang Kerja Veteriner</label><span class="text-danger">*</span>
                            <input readonly type="text" class="form-control" placeholder="-" name="bidang_kerja" value="{{ $value->bidang_kerja }}">
                        </div>
                        <div class="form-group">
                            <label>Nama Klinik (Tempat Praktek / Kerja)</label>
                            <input readonly type="text" class="form-control" placeholder="-" name="nama_klinik" value="{{ $value->nama_klinik }}">
                        </div>
                        <div class="form-group">
                            <label>Alamat Klinik (Tempat Praktek / Kerja)</label>
                            <input readonly type="text" class="form-control" placeholder="-" name="alamat_klinik" value="{{ $value->alamat_klinik }}">
                        </div>
                        <div class="form-group">
                            <label>No. Telp / Fax Klinik (Tempat Praktek / Kerja)</label>
                            <input readonly type="text" class="form-control" placeholder="-" name="no_telp_klinik" value="{{ $value->no_telp_klinik }}">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Data Berkas Dokter</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-4">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="card card-primary">
                                    <div class="card-header d-flex justify-content-center">
                                        <h4>Pas Foto</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="gallery gallery-fw" data-item-height="200">
                                            @if (is_null($dataBerkas->where('jenis_berkas','pas_foto')->pluck('nama_berkas')->first()))
                                            <div class="gallery-item" data-image="{{ asset('img/no_image.jpg') }}" data-title="Pas Foto"></div>
                                            @else
                                            <div class="gallery-item" data-image="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','pas_foto')->pluck('nama_berkas')->first()) }}" data-title="Pas Foto"></div>
                                            @endif
                                            <div class="row">
                                                @if (is_null($dataBerkas->where('jenis_berkas','pas_foto')->pluck('nama_berkas')->first()))
                                                <div class="text-muted mb-n2">
                                                    <p>Dokter belum mengupload berkas ini</p>
                                                </div>
                                                @else
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <span data-toggle="modal" data-target="#pasFoto">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Perbesar gambar">
                                                            <i class="fa fa-search-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="col-12 col-sm-12 col-lg-2 ml-2">
                                                    <form action="{{ url('adminPendaftaran/download') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" value="{{ $dataBerkas->where('jenis_berkas','pas_foto')->pluck('nama_berkas')->first() }}" name="namaFile">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Gambar">
                                                            <i class="fa fa-download"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-4">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="card card-primary">
                                    <div class="card-header d-flex justify-content-center">
                                        <h4>Ijazah</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="gallery gallery-fw" data-item-height="200">
                                            @if (is_null($dataBerkas->where('jenis_berkas','ijazah')->pluck('nama_berkas')->first()))
                                            <div class="gallery-item" data-image="{{ asset('img/no_image.jpg') }}" data-title="Pas Foto"></div>
                                            @else
                                            <div class="gallery-item" data-image="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','ijazah')->pluck('nama_berkas')->first()) }}" data-title="ijazah"></div>
                                            @endif
                                            <div class="row">
                                                @if (is_null($dataBerkas->where('jenis_berkas','ijazah')->pluck('nama_berkas')->first()))
                                                <div class="text-muted mb-n2">
                                                    <p>Dokter belum mengupload berkas ini</p>
                                                </div>
                                                @else
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <span data-toggle="modal" data-target="#ijazah">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Perbesar gambar">
                                                            <i class="fa fa-search-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="col-12 col-sm-12 col-lg-2 ml-2">
                                                    <form action="{{ url('adminPendaftaran/download') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" value="{{ $dataBerkas->where('jenis_berkas','ijazah')->pluck('nama_berkas')->first() }}" name="namaFile">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Gambar">
                                                            <i class="fa fa-download"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-4">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="card card-primary">
                                    <div class="card-header d-flex justify-content-center">
                                        <h4>KTP</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="gallery gallery-fw" data-item-height="200">
                                            @if (is_null($dataBerkas->where('jenis_berkas','ktp')->pluck('nama_berkas')->first()))
                                            <div class="gallery-item" data-image="{{ asset('img/no_image.jpg') }}" data-title="KTP">
                                            </div>
                                            @else
                                            <div class="gallery-item" data-image="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','ktp')->pluck('nama_berkas')->first()) }}" data-title="KTP"></div>
                                            @endif
                                            <div class="row">
                                                @if (is_null($dataBerkas->where('jenis_berkas','ktp')->pluck('nama_berkas')->first()))
                                                <div class="text-muted mb-n2">
                                                    <p>Dokter belum mengupload berkas ini</p>
                                                </div>
                                                @else
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <span data-toggle="modal" data-target="#ktp">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Perbesar gambar">
                                                            <i class="fa fa-search-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="col-12 col-sm-12 col-lg-2 ml-2">
                                                    <form action="{{ url('adminPendaftaran/download') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" value="{{ $dataBerkas->where('jenis_berkas','ktp')->pluck('nama_berkas')->first() }}" name="namaFile">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Gambar">
                                                            <i class="fa fa-download"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-4">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="card card-primary">
                                    <div class="card-header d-flex justify-content-center">
                                        <h4>KTA</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="gallery gallery-fw" data-item-height="200">
                                            @if (is_null($dataBerkas->where('jenis_berkas','kta')->pluck('nama_berkas')->first()))
                                            <div class="gallery-item" data-image="{{ asset('img/no_image.jpg') }}" data-title="KTA">
                                            </div>
                                            @else
                                            <div class="gallery-item" data-image="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','kta')->pluck('nama_berkas')->first()) }}" data-title="KTA"></div>
                                            @endif
                                            <div class="row">
                                                @if (is_null($dataBerkas->where('jenis_berkas','kta')->pluck('nama_berkas')->first()))
                                                <div class="text-muted mb-n2">
                                                    <p>Dokter belum mengupload berkas ini</p>
                                                </div>
                                                @else
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <span data-toggle="modal" data-target="#kta">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Perbesar gambar">
                                                            <i class="fa fa-search-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="col-12 col-sm-12 col-lg-2 ml-2">
                                                    <form action="{{ url('adminPendaftaran/download') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" value="{{ $dataBerkas->where('jenis_berkas','kta')->pluck('nama_berkas')->first() }}" name="namaFile">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Gambar">
                                                            <i class="fa fa-download"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-4">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="card card-primary">
                                    <div class="card-header d-flex justify-content-center">
                                        <h4>STRV</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="gallery gallery-fw" data-item-height="200">
                                            @if (is_null($dataBerkas->where('jenis_berkas','strv')->pluck('nama_berkas')->first()))
                                            <div class="gallery-item" data-image="{{ asset('img/no_image.jpg') }}" data-title="STRV">
                                            </div>
                                            @else
                                            <div class="gallery-item" data-image="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','strv')->pluck('nama_berkas')->first()) }}" data-title="STRV"></div>
                                            @endif
                                            <div class="row">
                                                @if (is_null($dataBerkas->where('jenis_berkas','strv')->pluck('nama_berkas')->first()))
                                                <div class="text-muted mb-n2">
                                                    <p>Dokter belum mengupload berkas ini</p>
                                                </div>
                                                @else
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <span data-toggle="modal" data-target="#strv">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Perbesar gambar">
                                                            <i class="fa fa-search-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="col-12 col-sm-12 col-lg-2 ml-2">
                                                    <form action="{{ url('adminPendaftaran/download') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" value="{{ $dataBerkas->where('jenis_berkas','strv')->pluck('nama_berkas')->first() }}" name="namaFile">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Gambar">
                                                            <i class="fa fa-download"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-4">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="card card-primary">
                                    <div class="card-header d-flex justify-content-center">
                                        <h4>SKDHI</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="gallery gallery-fw" data-item-height="200">
                                            @if (is_null($dataBerkas->where('jenis_berkas','skdhi')->pluck('nama_berkas')->first()))
                                            <div class="gallery-item" data-image="{{ asset('img/no_image.jpg') }}" data-title="SKDHI">
                                            </div>
                                            @else
                                            <div class="gallery-item" data-image="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','skdhi')->pluck('nama_berkas')->first()) }}" data-title="SKDHI"></div>
                                            @endif
                                            <div class="row">
                                                @if (is_null($dataBerkas->where('jenis_berkas','skdhi')->pluck('nama_berkas')->first()))
                                                <div class="text-muted mb-n2">
                                                    <p>Dokter belum mengupload berkas ini</p>
                                                </div>
                                                @else
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <span data-toggle="modal" data-target="#skdhi">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Perbesar gambar">
                                                            <i class="fa fa-search-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="col-12 col-sm-12 col-lg-2 ml-2">
                                                    <form action="{{ url('adminPendaftaran/download') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" value="{{ $dataBerkas->where('jenis_berkas','skdhi')->pluck('nama_berkas')->first() }}" name="namaFile">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Gambar">
                                                            <i class="fa fa-download"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-4">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="card card-primary">
                                    <div class="card-header d-flex justify-content-center">
                                        <h4>Tf Daftar</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="gallery gallery-fw" data-item-height="200">
                                            @if (is_null($dataBerkas->where('jenis_berkas','tf_daftar')->pluck('nama_berkas')->first()))
                                            <div class="gallery-item" data-image="{{ asset('img/no_image.jpg') }}" data-title="Tf Daftar"></div>
                                            @else
                                            <div class="gallery-item" data-image="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','tf_daftar')->pluck('nama_berkas')->first()) }}" data-title="Tf Daftar"></div>
                                            @endif
                                            <div class="row">
                                                @if (is_null($dataBerkas->where('jenis_berkas','tf_daftar')->pluck('nama_berkas')->first()))
                                                <div class="text-muted mb-n2">
                                                    <p>Dokter belum mengupload berkas ini</p>
                                                </div>
                                                @else
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <span data-toggle="modal" data-target="#tf_daftar">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Perbesar gambar">
                                                            <i class="fa fa-search-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="col-12 col-sm-12 col-lg-2 ml-2">
                                                    <form action="{{ url('adminPendaftaran/download') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" value="{{ $dataBerkas->where('jenis_berkas','tf_daftar')->pluck('nama_berkas')->first() }}" name="namaFile">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Gambar">
                                                            <i class="fa fa-download"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-4">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="card card-primary">
                                    <div class="card-header d-flex justify-content-center">
                                        <h4>Tf Keanggotaan</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="gallery gallery-fw" data-item-height="200">
                                            @if (is_null($dataBerkas->where('jenis_berkas','tf_registrasi')->pluck('nama_berkas')->first()))
                                            <div class="gallery-item" data-image="{{ asset('img/no_image.jpg') }}" data-title="Tf Registrasi"></div>
                                            @else
                                            <div class="gallery-item" data-image="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','tf_registrasi')->pluck('nama_berkas')->first()) }}" data-title="Tf Registrasi"></div>
                                            @endif
                                            <div class="row">
                                                @if (is_null($dataBerkas->where('jenis_berkas','tf_registrasi')->pluck('nama_berkas')->first()))
                                                <div class="text-muted mb-n2">
                                                    <p>Dokter belum mengupload berkas ini</p>
                                                </div>
                                                @else
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <span data-toggle="modal" data-target="#tf_registrasi">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Perbesar gambar">
                                                            <i class="fa fa-search-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="col-12 col-sm-12 col-lg-2 ml-2">
                                                    <form action="{{ url('adminPendaftaran/download') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" value="{{ $dataBerkas->where('jenis_berkas','tf_registrasi')->pluck('nama_berkas')->first() }}" name="namaFile">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Gambar">
                                                            <i class="fa fa-download"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($dataDokter as $key => $value)
        @if (is_null($value->tanggal_terdaftar))
        <div class="row justify-content-center">
            <div class="card col-6 col-md-6 col-lg-8 card-primary">
                <div class="card-header">
                    <h4>Form Aktivasi Anggota</h4>
                </div>
                <div class="card-body">
                    <span>Form ini diisi jika berkas registrasi dan berkas dokter sudah
                        memenuhi persyaratan pendaftaran (Kolom dengan tanda * wajib diisi)
                    </span>
                    <form method="POST" action="{{ url('adminPendaftaran/' . $value->id) }}">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="_method" value="PATCH">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label class="mt-3">Tanggal Terdaftar</label><span class="text-danger">*</span>
                                <div class="input-group date" data-provide="datepicker" data-date-format="dd-mm-yyyy">
                                    <input type="text" class="form-control" name="tanggal_terdaftar">
                                    <div class="input-group-addon">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                                @foreach($errors->get('tanggal_terdaftar') as $msg)
                                <p class="text-danger">{{$msg}}</p>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label>Masa Aktif</label><span class="text-danger">*</span>
                                <select name="masa_aktif" class="form-control">
                                    <option value="4">4 Tahun</option>>
                                    <option value="2">2 Tahun</option>>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Domisili Keanggotaan</label><span class="text-danger">*</span>
                                <select name="domisili_anggota" class="form-control">
                                    <option value="Tetap">Tetap</option>>
                                    <option value="Tamu">Tamu</option>>
                                </select>
                            </div>
                        </div>
                        <a class="btn btn-primary" href="/adminPendaftaran" role="button">Kembali</a>
                        <button type="submit" class="btn btn-primary">Daftarkan</button>
                    </form>
                </div>
                @else
                <div class="row justify-content-center">
                    <div class="card col-6 col-md-6 col-lg-8 card-primary">
                        <div class="card-header mb-2">
                            <h4>Detail Keanggotaan Dokter</h4>
                        </div>
                        <div class="card-body">
                            <span>Dokter ini sudah teregistrasi sebagai anggota PDHI Banten II, ke halaman administrasi anggota untuk mengubah ataupun perpanjang keanggotaan</span>
                            <form>
                                <div class="form-group mt-5">
                                    <div class="form-group">
                                        <label>Domisili Keanggotaan</label>
                                        <input readonly type="text" class="form-control" placeholder="-" name="email" value="{{ $value->domisili_anggota }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Terdaftar</label>
                                        <input readonly type="text" class="form-control" placeholder="-" name="email" value="{{ date('d-M-Y', strtotime($value->tanggal_terdaftar)) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Aktif Hingga</label>
                                        <input readonly type="text" class="form-control" placeholder="-" name="email" value="{{ date('d-M-Y', strtotime($value->masa_aktif)) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Status Saat Ini</label>
                                        @php
                                        date_default_timezone_set('Asia/jakarta');
                                        $now = new DateTime(date('Y-M-d'));
                                        $expired = new DateTime($value->masa_aktif);

                                        if ($now > $expired) {
                                        $status = '<span class="badge badge-pill badge-danger">Non Aktif</span>';
                                        } else {
                                        $status = '<span class="badge badge-pill badge-success">Aktif</span>';
                                        }
                                        @endphp
                                        <br>
                                        {!! $status !!}
                                    </div>
                                </div>
                            </form>
                            <a class="btn btn-primary mx-auto d-block" href="/adminPendaftaran" role="button">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>

    </section>
</div>
{{-- Modal Pas Foto --}}
<div class="modal fade" id="pasFoto" tabindex="-1" aria-labelledby="pasFoto" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pasFoto">Pas Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','pas_foto')->pluck('nama_berkas')->first()) }}" class="rounded mx-auto d-block" alt="{{ asset('img/no_image.jpg') }}" width="450px" height="550px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
{{-- Modal Ijazah --}}
<div class="modal fade" id="ijazah" tabindex="-1" aria-labelledby="ijazah" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pasFoto">Ijazah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','ijazah')->pluck('nama_berkas')->first()) }}" class="rounded mx-auto d-block" alt='_Berkas Tidak Ditemukan' width="450px" height="550px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
{{-- Modal KTP --}}
<div class="modal fade" id="ktp" tabindex="-1" aria-labelledby="ktp" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ktp">KTP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','ktp')->pluck('nama_berkas')->first()) }}" class="rounded mx-auto d-block" alt='_Berkas Tidak Ditemukan' width="450px" height="550px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
{{-- Modal KTA --}}
<div class="modal fade" id="kta" tabindex="-1" aria-labelledby="kta" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kta">KTA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','kta')->pluck('nama_berkas')->first()) }}" class="rounded mx-auto d-block" alt='_Berkas Tidak Ditemukan' width="450px" height="550px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
{{-- Modal STRV --}}
<div class="modal fade" id="strv" tabindex="-1" aria-labelledby="strv" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="strv">STRV</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','strv')->pluck('nama_berkas')->first()) }}" class="rounded mx-auto d-block" alt='_Berkas Tidak Ditemukan' width="450px" height="550px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
{{-- Modal SKDHI --}}
<div class="modal fade" id="skdhi" tabindex="-1" aria-labelledby="skdhi" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="skdhi">SKDHI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','skdhi')->pluck('nama_berkas')->first()) }}" class="rounded mx-auto d-block" alt='_Berkas Tidak Ditemukan' width="450px" height="550px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
{{-- Modal Tf Daftar --}}
<div class="modal fade" id="tf_daftar" tabindex="-1" aria-labelledby="tf_daftar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tf_daftar">Bukti Tf. Pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','tf_daftar')->pluck('nama_berkas')->first()) }}" class="rounded mx-auto d-block" alt='_Berkas Tidak Ditemukan' width="450px" height="550px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
{{-- Modal Tf Registrasi --}}
<div class="modal fade" id="tf_registrasi" tabindex="-1" aria-labelledby="tf_registrasi" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tf_registrasi">Bukti Tf. Keanggotaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','tf_registrasi')->pluck('nama_berkas')->first()) }}" class="rounded mx-auto d-block" alt='_Berkas Tidak Ditemukan' width="450px" height="550px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection