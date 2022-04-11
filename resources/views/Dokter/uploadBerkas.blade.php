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
                                                <div class="gallery-item"
                                                    data-image="{{ asset('img/samplepasphoto.jpg') }}"
                                                    data-title="Pas Foto"></div>
                                                <span data-toggle="modal" data-target="#exampleModal">
                                                    <button class="btn btn-primary" data-toggle="tooltip"
                                                        data-placement="top" title="Perbesar gambar">
                                                        <i class="fa fa-search-plus"></i>
                                                    </button>
                                                </span>
                                                <button class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                                    title="Unduh Gambar">
                                                    <i class="fa fa-download"></i>
                                                </button>
                                                <div class="custom-file mt-2">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Upload File</label>
                                                </div>
                                                <div>
                                                    <p class="text-muted">Upload berkas jika belum terlampir di gambar
                                                    </p>
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
                                            <h4>Ijazah drh.</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="gallery gallery-fw" data-item-height="200">
                                                <div class="gallery-item"
                                                    data-image="{{ asset('img/samplepasphoto.jpg') }}"
                                                    data-title="Ijazah drh."></div>
                                                <span data-toggle="modal" data-target="#exampleModal">
                                                    <button class="btn btn-primary" data-toggle="tooltip"
                                                        data-placement="top" title="Perbesar gambar">
                                                        <i class="fa fa-search-plus"></i>
                                                    </button>
                                                </span>
                                                <button class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                                    title="Unduh Gambar">
                                                    <i class="fa fa-download"></i>
                                                </button>
                                                <div class="custom-file mt-2">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Upload File</label>
                                                </div>
                                                <div>
                                                    <p class="text-muted">Upload berkas jika belum terlampir di gambar
                                                    </p>
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
                                                <div class="gallery-item"
                                                    data-image="{{ asset('img/samplepasphoto.jpg') }}" data-title="KTP">
                                                </div>
                                                <span data-toggle="modal" data-target="#exampleModal">
                                                    <button class="btn btn-primary" data-toggle="tooltip"
                                                        data-placement="top" title="Perbesar gambar">
                                                        <i class="fa fa-search-plus"></i>
                                                    </button>
                                                </span>
                                                <button class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                                    title="Unduh Gambar">
                                                    <i class="fa fa-download"></i>
                                                </button>
                                                <div class="custom-file mt-2">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Upload File</label>
                                                </div>
                                                <div>
                                                    <p class="text-muted">Upload berkas jika belum terlampir di gambar
                                                    </p>
                                                </div>
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
                                                <div class="gallery-item"
                                                    data-image="{{ asset('img/samplepasphoto.jpg') }}" data-title="KTA">
                                                </div>
                                                <span data-toggle="modal" data-target="#exampleModal">
                                                    <button class="btn btn-primary" data-toggle="tooltip"
                                                        data-placement="top" title="Perbesar gambar">
                                                        <i class="fa fa-search-plus"></i>
                                                    </button>
                                                </span>
                                                <button class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                                    title="Unduh Gambar">
                                                    <i class="fa fa-download"></i>
                                                </button>
                                                <div class="custom-file mt-2">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Upload File</label>
                                                </div>
                                                <div>
                                                    <p class="text-muted">Upload berkas jika belum terlampir di gambar
                                                    </p>
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
                                                <div class="gallery-item"
                                                    data-image="{{ asset('img/samplepasphoto.jpg') }}" data-title="STRV">
                                                </div>
                                                <span data-toggle="modal" data-target="#exampleModal">
                                                    <button class="btn btn-primary" data-toggle="tooltip"
                                                        data-placement="top" title="Perbesar gambar">
                                                        <i class="fa fa-search-plus"></i>
                                                    </button>
                                                </span>
                                                <button class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                                    title="Unduh Gambar">
                                                    <i class="fa fa-download"></i>
                                                </button>
                                                <div class="custom-file mt-2">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Upload File</label>
                                                </div>
                                                <div>
                                                    <p class="text-muted">Upload berkas jika belum terlampir di gambar
                                                    </p>
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
                                                <div class="gallery-item"
                                                    data-image="{{ asset('img/samplepasphoto.jpg') }}" data-title="SKDHI">
                                                </div>
                                                <span data-toggle="modal" data-target="#exampleModal">
                                                    <button class="btn btn-primary" data-toggle="tooltip"
                                                        data-placement="top" title="Perbesar gambar">
                                                        <i class="fa fa-search-plus"></i>
                                                    </button>
                                                </span>
                                                <button class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                                    title="Unduh Gambar">
                                                    <i class="fa fa-download"></i>
                                                </button>
                                                <div class="custom-file mt-2">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Upload File</label>
                                                </div>
                                                <div>
                                                    <p class="text-muted">Upload berkas jika belum terlampir di gambar
                                                    </p>
                                                </div>
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
                                                <div class="gallery-item"
                                                    data-image="{{ asset('img/samplepasphoto.jpg') }}"
                                                    data-title="Bukti Tf. Pendaftaran"></div>
                                                <span data-toggle="modal" data-target="#exampleModal">
                                                    <button class="btn btn-primary" data-toggle="tooltip"
                                                        data-placement="top" title="Perbesar gambar">
                                                        <i class="fa fa-search-plus"></i>
                                                    </button>
                                                </span>
                                                <button class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                                    title="Unduh Gambar">
                                                    <i class="fa fa-download"></i>
                                                </button>
                                                <div class="custom-file mt-2">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Upload File</label>
                                                </div>
                                                <div>
                                                    <p class="text-muted">Upload berkas jika belum terlampir di gambar
                                                    </p>
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
                                            <h4>Bukti Tf. Keanggotaan</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="gallery gallery-fw" data-item-height="200" disabled>
                                                <div class="gallery-item"
                                                    data-image="{{ asset('img/samplepasphoto.jpg') }}"
                                                    data-title="Bukti Tf. Keanggotaan"></div>
                                                <span data-toggle="modal" data-target="#exampleModal">
                                                    <button class="btn btn-primary" data-toggle="tooltip"
                                                        data-placement="top" title="Perbesar gambar">
                                                        <i class="fa fa-search-plus"></i>
                                                    </button>
                                                </span>
                                                <button class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                                    title="Unduh Gambar">
                                                    <i class="fa fa-download"></i>
                                                </button>
                                                <div class="custom-file mt-2">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Upload File</label>
                                                </div>
                                                <div>
                                                    <p class="text-muted">Upload berkas jika belum terlampir di gambar
                                                    </p>
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


        </section>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('img/samplepasphoto.jpg') }}" class="rounded mx-auto d-block"
                        alt="Gambar tidak ditemukan" width="450px">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

@endsection
