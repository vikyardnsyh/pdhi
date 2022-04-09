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
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Pas Foto</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="gallery gallery-fw" data-item-height="200">
                                                <div class="gallery-item" data-image="{{ asset('img/samplepasphoto.jpg') }}" data-title="Pas Foto"></div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Upload File</label>
                                                </div>
                                                <div>
                                                    <p class="text-muted">Upload berkas jika belum terlampir di gambar</p>
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
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Ijazah drh.</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="gallery gallery-fw" data-item-height="200">
                                                <div class="gallery-item" data-image="{{ asset('img/samplepasphoto.jpg') }}" data-title="Ijazah drh."></div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Upload File</label>
                                                </div>
                                                <div>
                                                    <p class="text-muted">Upload berkas jika belum terlampir di gambar</p>
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
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>KTP</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="gallery gallery-fw" data-item-height="200">
                                                <div class="gallery-item" data-image="{{ asset('img/samplepasphoto.jpg') }}" data-title="KTP"></div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Upload File</label>
                                                </div>
                                                <div>
                                                    <p class="text-muted">Upload berkas jika belum terlampir di gambar</p>
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
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>KTA</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="gallery gallery-fw" data-item-height="200">
                                                <div class="gallery-item" data-image="{{ asset('img/samplepasphoto.jpg') }}" data-title="KTA" onclick="showimage()"></div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Upload File</label>
                                                </div>
                                                <div>
                                                    <p class="text-muted">Upload berkas jika belum terlampir di gambar</p>
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
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>STRV</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="gallery gallery-fw" data-item-height="200">
                                                <div class="gallery-item" data-image="{{ asset('img/samplepasphoto.jpg') }}" data-title="STRV"></div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Upload File</label>
                                                </div>
                                                <div>
                                                    <p class="text-muted">Upload berkas jika belum terlampir di gambar</p>
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
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>SKDHI</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="gallery gallery-fw" data-item-height="200">
                                                <div class="gallery-item" data-image="{{ asset('img/samplepasphoto.jpg') }}" data-title="SKDHI"></div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Upload File</label>
                                                </div>
                                                <div>
                                                    <p class="text-muted">Upload berkas jika belum terlampir di gambar</p>
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
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Bukti Tf. Pendaftaran</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="gallery gallery-fw" data-item-height="200">
                                                <div class="gallery-item" data-image="{{ asset('img/samplepasphoto.jpg') }}" data-title="Bukti Tf. Pendaftaran"></div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Upload File</label>
                                                </div>
                                                <div>
                                                    <p class="text-muted">Upload berkas jika belum terlampir di gambar</p>
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
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Bukti Tf. Keanggotaan</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="gallery gallery-fw" data-item-height="200">
                                                <div class="gallery-item" data-image="{{ asset('img/samplepasphoto.jpg') }}" data-title="Bukti Tf. Keanggotaan"></div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Upload File</label>
                                                </div>
                                                <div>
                                                    <p class="text-muted">Upload berkas jika belum terlampir di gambar</p>
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

@endsection
