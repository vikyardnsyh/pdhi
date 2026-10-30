@extends('layouts.pengguna')
@section('title', 'Upload Berkas')

@section('content')
@php
$berkasList = [
    [
        'id' => 1,
        'title' => 'Pas Foto',
        'field' => 'pas_foto',
        'jenis_berkas' => 'pas_foto',
        'modalId' => 'pasFoto',
        'collapseId' => 'collapsePasFoto',
    ],
    [
        'id' => 2,
        'title' => 'Ijazah drh. (Legalisir)',
        'field' => 'ijazah_drh',
        'jenis_berkas' => 'ijazah',
        'modalId' => 'ijazah',
        'collapseId' => 'collapseIjazah',
    ],
    [
        'id' => 3,
        'title' => 'KTP',
        'field' => 'ktp',
        'jenis_berkas' => 'ktp',
        'modalId' => 'ktp',
        'collapseId' => 'collapseKtp',
    ],
    [
        'id' => 4,
        'title' => 'KTA',
        'field' => 'kta',
        'jenis_berkas' => 'kta',
        'modalId' => 'kta',
        'collapseId' => 'collapseKta',
    ],
    [
        'id' => 5,
        'title' => 'STRV',
        'field' => 'strv',
        'jenis_berkas' => 'strv',
        'modalId' => 'strv',
        'collapseId' => 'collapseStrv',
    ],
    [
        'id' => 6,
        'title' => 'SKDHI',
        'field' => 'skdhi',
        'jenis_berkas' => 'skdhi',
        'modalId' => 'skdhi',
        'collapseId' => 'collapseSkdhi',
    ],
    [
        'id' => 7,
        'title' => 'Bukti Tf. Pendaftaran',
        'field' => 'tf_daftar',
        'jenis_berkas' => 'tf_daftar',
        'modalId' => 'tf_daftar',
        'collapseId' => 'collapseTfDaftar',
    ],
    [
        'id' => 8,
        'title' => 'Bukti Tf. Keanggotaan',
        'field' => 'tf_registrasi',
        'jenis_berkas' => 'tf_registrasi',
        'modalId' => 'tf_registrasi',
        'collapseId' => 'collapseTfRegistrasi',
    ],
];
@endphp

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Upload Berkas</h1>
                <small class="text-muted">Unggah dokumen persyaratan untuk verifikasi keanggotaan</small>
            </div>
        </div>

        <div class="card card-primary shadow-sm mb-4">
            <div class="card-header border-bottom py-3">
                <h4 class="text-dark font-weight-bold mb-0">
                    <i class="fas fa-folder-open text-primary mr-2"></i> Dokumen Persyaratan Anggota
                </h4>
            </div>
            <div class="card-body">
                <div class="alert alert-light border d-flex align-items-start mb-4">
                    <i class="fas fa-info-circle text-primary fa-lg mr-3 mt-1"></i>
                    <div>
                        <strong>Petunjuk Unggah:</strong>
                        <ul class="mb-0 pl-3 text-small">
                            <li>Unggah berkas asli berupa hasil scan rapi (JPG, PNG, atau PDF) ukuran maksimal 2MB.</li>
                            <li>Pastikan dokumen dapat terbaca dengan jelas untuk mempercepat proses verifikasi oleh Administrator.</li>
                        </ul>
                    </div>
                </div>

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
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="card border h-100 shadow-sm {{ $isUploaded ? 'border-success' : '' }}">
                                <div class="card-header bg-light d-flex justify-content-between align-items-center py-2 px-3">
                                    <h6 class="mb-0 font-weight-bold text-dark">{{ $item['title'] }}</h6>
                                    @if ($isUploaded)
                                        <span class="badge badge-success"><i class="fas fa-check"></i> Siap</span>
                                    @else
                                        <span class="badge badge-danger"><i class="fas fa-times"></i> Belum</span>
                                    @endif
                                </div>
                                <div class="card-body p-3 d-flex flex-column justify-content-between">
                                    {{-- Preview Area --}}
                                    <div class="text-center mb-3 p-2 bg-light rounded" style="min-height: 180px; display: flex; align-items: center; justify-content: center;">
                                        @if ($isUploaded && !$isPdf)
                                            <img src="{{ $imageSrc }}" alt="{{ $item['title'] }}" class="img-fluid rounded" style="max-height: 170px; object-fit: contain; cursor: pointer;" data-toggle="modal" data-target="#{{ $item['modalId'] }}">
                                        @elseif ($isUploaded && $isPdf)
                                            <div class="text-center py-4">
                                                <i class="fas fa-file-pdf fa-4x text-danger mb-2"></i>
                                                <div class="text-muted text-small font-weight-bold">Dokumen Format PDF</div>
                                            </div>
                                        @else
                                            <div class="text-center py-4 text-muted">
                                                <i class="fas fa-file-upload fa-3x mb-2 text-black-50"></i>
                                                <div class="text-small">Belum ada file diunggah</div>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Action Buttons & Upload Forms --}}
                                    <div>
                                        @if (!$isUploaded)
                                            <form method="POST" action="{{ url('uploadBerkas') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group mb-2">
                                                    <label class="text-small font-weight-bold mb-1">Pilih File (JPG/PNG/PDF):</label>
                                                    <input type="file" class="form-control form-control-sm" name="{{ $item['field'] }}" accept="image/*,.pdf" required>
                                                </div>
                                                <button class="btn btn-primary btn-block btn-sm" type="submit">
                                                    <i class="fas fa-upload mr-1"></i> Unggah Berkas
                                                </button>
                                                @if ($errors->first($item['field']))
                                                    <div class="text-danger text-small mt-1">
                                                        {{ $errors->first($item['field']) }}
                                                    </div>
                                                @endif
                                            </form>
                                        @else
                                            {{-- Uploaded Action Controls --}}
                                            <div class="d-flex justify-content-center gap-2 mb-2">
                                                @if (!$isPdf)
                                                    <button class="btn btn-sm btn-info mr-1" data-toggle="modal" data-target="#{{ $item['modalId'] }}" title="Lihat Pratinjau">
                                                        <i class="fas fa-search-plus mr-1"></i> Lihat
                                                    </button>
                                                @endif
                                                <form action="{{ url('uploadBerkas/download') }}" method="GET" class="d-inline">
                                                    @csrf
                                                    <input type="hidden" value="{{ $namaBerkas }}" name="namaFile">
                                                    <button class="btn btn-sm btn-success" type="submit" title="Unduh Berkas">
                                                        <i class="fas fa-download mr-1"></i> Unduh
                                                    </button>
                                                </form>
                                            </div>

                                            <button class="btn btn-sm btn-warning text-dark font-weight-600 btn-block mt-2 shadow-sm" type="button" data-toggle="collapse" data-target="#{{ $item['collapseId'] }}" aria-expanded="false">
                                                <i class="fas fa-sync-alt mr-1"></i> Ganti / Upload Ulang
                                            </button>

                                            <div class="collapse mt-2" id="{{ $item['collapseId'] }}">
                                                <form method="POST" action="{{ url('uploadBerkas/' . $idDokter) }}" enctype="multipart/form-data" class="p-2 border rounded bg-light">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="PATCH">
                                                    <div class="form-group mb-2">
                                                        <label class="text-small font-weight-bold mb-1">File Pengganti:</label>
                                                        <input type="file" class="form-control form-control-sm" name="{{ $item['field'] }}" accept="image/*,.pdf" required>
                                                    </div>
                                                    <button class="btn btn-primary btn-block btn-sm" type="submit">
                                                        <i class="fas fa-save mr-1"></i> Simpan File Baru
                                                    </button>
                                                </form>
                                            </div>
                                            @if ($errors->first($item['field']))
                                                <div class="text-danger text-small mt-1">
                                                    {{ $errors->first($item['field']) }}
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Responsive Modals for Image Preview --}}
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
                        <form action="{{ url('uploadBerkas/download') }}" method="GET">
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
