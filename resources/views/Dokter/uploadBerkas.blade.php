@extends('layouts.pengguna')
@section('title', 'Berkas')
@section('sidebar')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Upload Berkas</h1>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Data Berkas Dokter</h4>
            </div>
            <div class="card-body">
                <span><b>Mohon untuk hanya mengupload berkas asli berupa gambar hasil scan dengan ukuran kertas A4 untuk kelancaran verifikasi.</b></span><br>
                <span><b>Data yang tidak sesuai dengan ketentuan akan diinfokan oleh admin untuk upload ulang berkas.</b></span>
                <div class="row mt-3">
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
                                            <div class="gallery-item" data-image="{{ asset('img/berkas_dokter/'.$dataBerkas->where('jenis_berkas','pas_foto')->pluck('nama_berkas')->first()) }}" data-title="Pas Foto"></div>
                                            @endif
                                            @if(is_null($dataBerkas->where('jenis_berkas','pas_foto')->pluck('nama_berkas')->first()))
                                            <form method="POST" action="{{ url('uploadBerkas') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Upload File</label>
                                                        <input type="file" class="form-control mt-n2" name="pas_foto" multiple accept="image/*">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary mt-n4" type="submit">
                                                    Simpan Berkas
                                                </button>
                                            </form>
                                            <div>
                                                <p class="text-muted">Anda belum mengupload berkas
                                                </p>
                                            </div>
                                            @else
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <span data-toggle="modal" data-target="#pasFoto">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Perbesar gambar">
                                                            <i class="fa fa-search-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <form action="{{ url('uploadBerkas/download') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" value="{{$dataBerkas->where('jenis_berkas','pas_foto')->pluck('nama_berkas')->first()}}" name="namaFile">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Gambar">
                                                            <i class="fa fa-download"></i>
                                                        </button>
                                                    </form>
                                                </div>

                                            </div>
                                            <div>
                                                <p class="text-muted">Anda sudah mengupload berkas
                                                </p>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="row justify-content-center">
                                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePasFoto" aria-expanded="false" aria-controls="collapsePasFoto">
                                                Upload ulang berkas
                                            </button>
                                        </div>
                                        <div class="collapse" id="collapsePasFoto">
                                            <form method="POST" action="{{ url('uploadBerkas/' . $idDokter) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="_method" value="PATCH">
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Upload File</label>
                                                        <input type="file" class="form-control" name="pas_foto" multiple accept="image/*">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary mt-n4" type="submit">
                                                    Simpan Berkas
                                                </button>
                                            </form>
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
                                        <h4>Ijazah drh. (Legalisir)</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="gallery gallery-fw" data-item-height="200">
                                            @if (is_null($dataBerkas->where('jenis_berkas','ijazah')->pluck('nama_berkas')->first()))
                                            <div class="gallery-item" data-image="{{ asset('img/no_image.jpg') }}" data-title="Pas Foto"></div>
                                            @else
                                            <div class="gallery-item" data-image="{{ asset('img/berkas_dokter/'.$dataBerkas->where('jenis_berkas','ijazah')->pluck('nama_berkas')->first()) }}" data-title="Pas Foto"></div>
                                            @endif
                                            @if(is_null($dataBerkas->where('jenis_berkas','ijazah')->pluck('nama_berkas')->first()))
                                            <form method="POST" action="{{ url('uploadBerkas') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Upload File</label>
                                                        <input type="file" class="form-control mt-n2" name="ijazah_drh" multiple accept="image/*">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary mt-n4" type="submit">
                                                    Simpan Berkas
                                                </button>
                                            </form>
                                            <div>
                                                <p class="text-muted">Anda belum mengupload berkas
                                                </p>
                                            </div>
                                            @else
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <span data-toggle="modal" data-target="#ijazah">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Perbesar gambar">
                                                            <i class="fa fa-search-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <form action="{{ url('uploadBerkas/download') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" value="{{$dataBerkas->where('jenis_berkas','ijazah')->pluck('nama_berkas')->first()}}" name="namaFile">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Gambar">
                                                            <i class="fa fa-download"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            </form>
                                            <div>
                                                <p class="text-muted">Anda sudah mengupload berkas
                                                </p>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="row justify-content-center">
                                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseIjazah" aria-expanded="false" aria-controls="collapseIjazah">
                                                Upload ulang berkas
                                            </button>
                                        </div>
                                        <div class="collapse" id="collapseIjazah">
                                            <form method="POST" action="{{ url('uploadBerkas/' . $idDokter) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="_method" value="PATCH">
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Upload File</label>
                                                        <input type="file" class="form-control" name="ijazah_drh" multiple accept="image/*">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary mt-n4" type="submit">
                                                    Simpan Berkas
                                                </button>
                                            </form>
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
                                            <div class="gallery-item" data-image="{{ asset('img/no_image.jpg') }}" data-title="Pas Foto"></div>
                                            @else
                                            <div class="gallery-item" data-image="{{ asset('img/berkas_dokter/'.$dataBerkas->where('jenis_berkas','ktp')->pluck('nama_berkas')->first()) }}" data-title="Pas Foto"></div>
                                            @endif
                                            @if(is_null($dataBerkas->where('jenis_berkas','ktp')->pluck('nama_berkas')->first()))
                                            <form method="POST" action="{{ url('uploadBerkas') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Upload File</label>
                                                        <input type="file" class="form-control mt-n2" name="ktp" multiple accept="image/*">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary mt-n4" type="submit">
                                                    Simpan Berkas
                                                </button>
                                            </form>
                                            <div>
                                                <p class="text-muted">Anda belum mengupload berkas
                                                </p>
                                            </div>
                                            @else
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <span data-toggle="modal" data-target="#ktp">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Perbesar gambar">
                                                            <i class="fa fa-search-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <form action="{{ url('uploadBerkas/download') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" value="{{$dataBerkas->where('jenis_berkas','ktp')->pluck('nama_berkas')->first()}}" name="namaFile">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Gambar">
                                                            <i class="fa fa-download"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="text-muted">Anda sudah mengupload berkas
                                                </p>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="row justify-content-center">
                                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseKtp" aria-expanded="false" aria-controls="collapseKtp">
                                                Upload ulang berkas
                                            </button>
                                        </div>
                                        <div class="collapse" id="collapseKtp">
                                            <form method="POST" action="{{ url('uploadBerkas/' . $idDokter) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="_method" value="PATCH">
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Upload File</label>
                                                        <input type="file" class="form-control" name="ktp" multiple accept="image/*">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary mt-n4" type="submit">
                                                    Simpan Berkas
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
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
                                            <div class="gallery-item" data-image="{{ asset('img/no_image.jpg') }}" data-title="Pas Foto"></div>
                                            @else
                                            <div class="gallery-item" data-image="{{ asset('img/berkas_dokter/'.$dataBerkas->where('jenis_berkas','kta')->pluck('nama_berkas')->first()) }}" data-title="Pas Foto"></div>
                                            @endif
                                            @if(is_null($dataBerkas->where('jenis_berkas','kta')->pluck('nama_berkas')->first()))
                                            <form method="POST" action="{{ url('uploadBerkas') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Upload File</label>
                                                        <input type="file" class="form-control mt-n2" name="kta" multiple accept="image/*">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary mt-n4" type="submit">
                                                    Simpan Berkas
                                                </button>
                                            </form>
                                            <div>
                                                <p class="text-muted">Anda belum mengupload berkas
                                                </p>
                                            </div>
                                            @else
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <span data-toggle="modal" data-target="#kta">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Perbesar gambar">
                                                            <i class="fa fa-search-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <form action="{{ url('uploadBerkas/download') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" value="{{$dataBerkas->where('jenis_berkas','kta')->pluck('nama_berkas')->first()}}" name="namaFile">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Gambar">
                                                            <i class="fa fa-download"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="text-muted">Anda sudah mengupload berkas
                                                </p>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="row justify-content-center">
                                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseKta" aria-expanded="false" aria-controls="collapseKta">
                                                Upload ulang berkas
                                            </button>
                                        </div>
                                        <div class="collapse" id="collapseKta">
                                            <form method="POST" action="{{ url('uploadBerkas/' . $idDokter) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="_method" value="PATCH">
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Upload File</label>
                                                        <input type="file" class="form-control" name="kta" multiple accept="image/*">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary mt-n4" type="submit">
                                                    Simpan Berkas
                                                </button>
                                            </form>
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
                                            <div class="gallery-item" data-image="{{ asset('img/no_image.jpg') }}" data-title="Pas Foto"></div>
                                            @else
                                            <div class="gallery-item" data-image="{{ asset('img/berkas_dokter/'.$dataBerkas->where('jenis_berkas','strv')->pluck('nama_berkas')->first()) }}" data-title="Pas Foto"></div>
                                            @endif
                                            @if(is_null($dataBerkas->where('jenis_berkas','strv')->pluck('nama_berkas')->first()))
                                            <form method="POST" action="{{ url('uploadBerkas') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Upload File</label>
                                                        <input type="file" class="form-control mt-n2" name="strv" multiple accept="image/*">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary mt-n4" type="submit">
                                                    Simpan Berkas
                                                </button>
                                            </form>
                                            <div>
                                                <p class="text-muted">Anda belum mengupload berkas
                                                </p>
                                            </div>
                                            @else
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <span data-toggle="modal" data-target="#strv">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Perbesar gambar">
                                                            <i class="fa fa-search-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <form action="{{ url('uploadBerkas/download') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" value="{{$dataBerkas->where('jenis_berkas','strv')->pluck('nama_berkas')->first()}}" name="namaFile">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Gambar">
                                                            <i class="fa fa-download"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="text-muted">Anda sudah mengupload berkas
                                                </p>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="row justify-content-center">
                                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseStrv" aria-expanded="false" aria-controls="collapseStrv">
                                                Upload ulang berkas
                                            </button>
                                        </div>
                                        <div class="collapse" id="collapseStrv">
                                            <form method="POST" action="{{ url('uploadBerkas/' . $idDokter) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="_method" value="PATCH">
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Upload File</label>
                                                        <input type="file" class="form-control" name="strv" multiple accept="image/*">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary mt-n4" type="submit">
                                                    Simpan Berkas
                                                </button>
                                            </form>
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
                                            <div class="gallery-item" data-image="{{ asset('img/no_image.jpg') }}" data-title="Pas Foto"></div>
                                            @else
                                            <div class="gallery-item" data-image="{{ asset('img/berkas_dokter/'.$dataBerkas->where('jenis_berkas','skdhi')->pluck('nama_berkas')->first()) }}" data-title="Pas Foto"></div>
                                            @endif
                                            @if(is_null($dataBerkas->where('jenis_berkas','skdhi')->pluck('nama_berkas')->first()))
                                            <form method="POST" action="{{ url('uploadBerkas') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Upload File</label>
                                                        <input type="file" class="form-control mt-n2" name="skdhi" multiple accept="image/*">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary mt-n4" type="submit">
                                                    Simpan Berkas
                                                </button>
                                            </form>
                                            <div>
                                                <p class="text-muted">Anda belum mengupload berkas
                                                </p>
                                            </div>
                                            @else
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <span data-toggle="modal" data-target="#skdhi">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Perbesar gambar">
                                                            <i class="fa fa-search-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <form action="{{ url('uploadBerkas/download') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" value="{{$dataBerkas->where('jenis_berkas','skdhi')->pluck('nama_berkas')->first()}}" name="namaFile">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Gambar">
                                                            <i class="fa fa-download"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="text-muted">Anda sudah mengupload berkas
                                                </p>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="row justify-content-center">
                                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseSkdhi" aria-expanded="false" aria-controls="collapseSkdhi">
                                                Upload ulang berkas
                                            </button>
                                        </div>
                                        <div class="collapse" id="collapseSkdhi">
                                            <form method="POST" action="{{ url('uploadBerkas/' . $idDokter) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="_method" value="PATCH">
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Upload File</label>
                                                        <input type="file" class="form-control" name="skdhi" multiple accept="image/*">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary mt-n4" type="submit">
                                                    Simpan Berkas
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-4">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="card card-primary">
                                    <div class="card-header d-flex justify-content-center">
                                        <h4>Bukti Tf. Pendaftaran</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="gallery gallery-fw" data-item-height="200">
                                            @if (is_null($dataBerkas->where('jenis_berkas','tf_daftar')->pluck('nama_berkas')->first()))
                                            <div class="gallery-item" data-image="{{ asset('img/no_image.jpg') }}" data-title="Pas Foto"></div>
                                            @else
                                            <div class="gallery-item" data-image="{{ asset('img/berkas_dokter/'.$dataBerkas->where('jenis_berkas','tf_daftar')->pluck('nama_berkas')->first()) }}" data-title="Pas Foto"></div>
                                            @endif
                                            @if(is_null($dataBerkas->where('jenis_berkas','tf_daftar')->pluck('nama_berkas')->first()))
                                            <form method="POST" action="{{ url('uploadBerkas') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Upload File</label>
                                                        <input type="file" class="form-control mt-n2" name="tf_daftar" multiple accept="image/*">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary mt-n4" type="submit">
                                                    Simpan Berkas
                                                </button>
                                            </form>
                                            <div>
                                                <p class="text-muted">Anda belum mengupload berkas
                                                </p>
                                            </div>
                                            @else
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <span data-toggle="modal" data-target="#tf_daftar">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Perbesar gambar">
                                                            <i class="fa fa-search-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <form action="{{ url('uploadBerkas/download') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" value="{{$dataBerkas->where('jenis_berkas','tf_daftar')->pluck('nama_berkas')->first()}}" name="namaFile">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Gambar">
                                                            <i class="fa fa-download"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="text-muted">Anda sudah mengupload berkas
                                                </p>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="row justify-content-center">
                                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseTfDaftar" aria-expanded="false" aria-controls="collapseTfDaftar">
                                                Upload ulang berkas
                                            </button>
                                        </div>
                                        <div class="collapse" id="collapseTfDaftar">
                                            <form method="POST" action="{{ url('uploadBerkas/' . $idDokter) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="_method" value="PATCH">
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Upload File</label>
                                                        <input type="file" class="form-control" name="tf_daftar" multiple accept="image/*">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary mt-n4" type="submit">
                                                    Simpan Berkas
                                                </button>
                                            </form>
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
                                        <h4>Bukti Tf. Keanggotaan</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="gallery gallery-fw" data-item-height="200" disabled>
                                            @if (is_null($dataBerkas->where('jenis_berkas','tf_registrasi')->pluck('nama_berkas')->first()))
                                            <div class="gallery-item" data-image="{{ asset('img/no_image.jpg') }}" data-title="Pas Foto"></div>
                                            @else
                                            <div class="gallery-item" data-image="{{ asset('img/berkas_dokter/'.$dataBerkas->where('jenis_berkas','tf_registrasi')->pluck('nama_berkas')->first()) }}" data-title="Pas Foto"></div>
                                            @endif
                                            @if(is_null($dataBerkas->where('jenis_berkas','tf_registrasi')->pluck('nama_berkas')->first()))
                                            <form method="POST" action="{{ url('uploadBerkas') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Upload File</label>
                                                        <input type="file" class="form-control mt-n2" name="tf_registrasi" multiple accept="image/*">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary mt-n4" type="submit">
                                                    Simpan Berkas
                                                </button>
                                            </form>
                                            <div>
                                                <p class="text-muted">Anda belum mengupload berkas
                                                </p>
                                            </div>
                                            @else
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <span data-toggle="modal" data-target="#tf_registrasi">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Perbesar gambar">
                                                            <i class="fa fa-search-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="col-12 col-sm-12 col-lg-2">
                                                    <form action="{{ url('uploadBerkas/download') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" value="{{$dataBerkas->where('jenis_berkas','tf_registrasi')->pluck('nama_berkas')->first()}}" name="namaFile">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Gambar">
                                                            <i class="fa fa-download"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="text-muted">Anda sudah mengupload berkas
                                                </p>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="row justify-content-center">
                                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseTfRegistrasi" aria-expanded="false" aria-controls="collapseTfRegistrasi">
                                                Upload ulang berkas
                                            </button>
                                        </div>
                                        <div class="collapse" id="collapseTfRegistrasi">
                                            <form method="POST" action="{{ url('uploadBerkas/' . $idDokter) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="_method" value="PATCH">
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Upload File</label>
                                                        <input type="file" class="form-control" name="tf_registrasi" multiple accept="image/*">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary mt-n4" type="submit">
                                                    Simpan Berkas
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                <img src="{{ asset('img/berkas_dokter/'.$dataBerkas->where('jenis_berkas','pas_foto')->pluck('nama_berkas')->first()) }}" class="rounded mx-auto d-block" alt="{{ asset('img/no_image.jpg') }}" width="450px" height=500px">
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
                <img src="{{ asset('img/berkas_dokter/'.$dataBerkas->where('jenis_berkas','ijazah')->pluck('nama_berkas')->first()) }}" class="rounded mx-auto d-block" alt='_Berkas Tidak Ditemukan' width="450px" height="500px">
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
                <img src="{{ asset('img/berkas_dokter/'.$dataBerkas->where('jenis_berkas','ktp')->pluck('nama_berkas')->first()) }}" class="rounded mx-auto d-block" alt='_Berkas Tidak Ditemukan' width="450px" height="500px">
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
                <img src="{{ asset('img/berkas_dokter/'.$dataBerkas->where('jenis_berkas','kta')->pluck('nama_berkas')->first()) }}" class="rounded mx-auto d-block" alt='_Berkas Tidak Ditemukan' width="450px" height="500px">
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
                <img src="{{ asset('img/berkas_dokter/'.$dataBerkas->where('jenis_berkas','strv')->pluck('nama_berkas')->first()) }}" class="rounded mx-auto d-block" alt='_Berkas Tidak Ditemukan' width="450px" height="500px">
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
                <img src="{{ asset('img/berkas_dokter/'.$dataBerkas->where('jenis_berkas','skdhi')->pluck('nama_berkas')->first()) }}" class="rounded mx-auto d-block" alt='_Berkas Tidak Ditemukan' width="450px" height="500px">
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
                <img src="{{ asset('img/berkas_dokter/'.$dataBerkas->where('jenis_berkas','tf_daftar')->pluck('nama_berkas')->first()) }}" class="rounded mx-auto d-block" alt='_Berkas Tidak Ditemukan' width="450px" height="500px">
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
                <img src="{{ asset('img/berkas_dokter/'.$dataBerkas->where('jenis_berkas','tf_registrasi')->pluck('nama_berkas')->first()) }}" class="rounded mx-auto d-block" alt='_Berkas Tidak Ditemukan' width="450px" height="500px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection