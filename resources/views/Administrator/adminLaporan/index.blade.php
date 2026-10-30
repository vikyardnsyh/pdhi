@extends('layouts.administrator')
@section('title', 'Laporan & Ekspor Data')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Laporan & Ekspor Data</h1>
                <small class="text-muted">Unduh rekapitulasi data anggota (Excel) dan cetak berkas dokter (PDF)</small>
            </div>
        </div>

        {{-- Excel Export Cards --}}
        <div class="row mb-4">
            {{-- Export Anggota --}}
            <div class="col-12 col-md-6 mb-3">
                <div class="card card-primary shadow-sm h-100">
                    <div class="card-body p-4 d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-success text-white rounded-circle p-3 mr-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 55px; height: 55px;">
                                <i class="fas fa-file-excel fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="font-weight-bold text-dark mb-1">Data Seluruh Anggota</h5>
                                <small class="text-muted">Unduh rekap dokter yang sudah berstatus anggota resmi</small>
                            </div>
                        </div>
                        <form action="{{ url('/adminLaporan/export') }}" method="GET">
                            <button class="btn btn-success" type="submit" name="anggota" value="1">
                                <i class="fas fa-download mr-1"></i> Unduh Excel
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Export Non Anggota --}}
            <div class="col-12 col-md-6 mb-3">
                <div class="card card-warning shadow-sm h-100">
                    <div class="card-body p-4 d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning text-white rounded-circle p-3 mr-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 55px; height: 55px;">
                                <i class="fas fa-file-excel fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="font-weight-bold text-dark mb-1">Data Non-Anggota</h5>
                                <small class="text-muted">Unduh data dokter yang belum terdaftar atau ditinjau</small>
                            </div>
                        </div>
                        <form action="{{ url('/adminLaporan/export') }}" method="GET">
                            <button class="btn btn-warning" type="submit" name="nonanggota" value="1">
                                <i class="fas fa-download mr-1"></i> Unduh Excel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Single Doctor PDF Dossier Download Card --}}
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="card card-primary shadow-sm mb-4">
                    <div class="card-header-responsive border-bottom">
                        <h4 class="text-dark font-weight-bold">
                            <i class="fas fa-file-pdf text-danger mr-2"></i> Cetak Berkas Dokumen Dokter (PDF)
                        </h4>
                        <div class="card-header-action">
                            <form action="{{ url('adminLaporan/') }}" method="GET" class="d-flex align-items-center gap-1">
                                <div class="input-group">
                                    <input type="search" class="form-control" name="cariDokter" value="{{ request('cariDokter') }}" placeholder="Cari nama dokter...">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary" title="Cari"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                            <a class="btn btn-outline-secondary ml-1" href="{{ url('/adminLaporan') }}" role="button" title="Reset">
                                <i class="fas fa-undo"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if(is_null($data))
                            <div class="text-center py-5 text-muted">
                                <i class="fas fa-search fa-3x mb-3 text-black-50"></i>
                                <h6 class="font-weight-normal">Ketikkan nama dokter pada kolom pencarian di atas untuk mencetak berkas PDF.</h6>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th class="text-left">Nama Lengkap</th>
                                            <th>Username</th>
                                            <th>Status</th>
                                            <th>Unduh PDF</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $key => $value)
                                        <tr class="text-center">
                                            <td>{{ $data->firstItem() + $key }}</td>
                                            <td class="text-left font-weight-600 text-dark">{{ $value->nama_lengkap }}</td>
                                            <td><code>{{ $value->username }}</code></td>
                                            <td>
                                                @php
                                                date_default_timezone_set('Asia/Jakarta');
                                                $now = new DateTime(date('Y-m-d'));
                                                $expired = !empty($value->masa_aktif) ? new DateTime($value->masa_aktif) : null;
                                                if(is_null($value->masa_aktif)) {
                                                    $status = '<span class="badge badge-danger">Belum Terdaftar</span>';
                                                } else {
                                                    $status = ($now > $expired)
                                                        ? '<span class="badge badge-secondary">Non Aktif</span>'
                                                        : '<span class="badge badge-success">Aktif</span>';
                                                }
                                                @endphp
                                                {!! $status !!}
                                            </td>
                                            <td>
                                                <form action="{{ url('/adminLaporan/generate-pdf') }}" method="GET" target="_blank">
                                                    @csrf
                                                    <input type="hidden" value="{{ $value->id }}" name="id">
                                                    <button class="btn btn-sm btn-danger" type="submit" title="Unduh Berkas Lengkap PDF">
                                                        <i class="fas fa-file-pdf mr-1"></i> Cetak PDF
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="table-empty-state">
                                                <div class="empty-state-icon">
                                                    <i class="fas fa-search"></i>
                                                </div>
                                                <p class="empty-state-text">Tidak ada dokter yang cocok dengan kata kunci pencarian.</p>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-between align-items-center flex-wrap mt-3 pt-2 border-top">
                                <small class="text-muted">
                                    Menampilkan {{ $data->firstItem() ?? 0 }} - {{ $data->lastItem() ?? 0 }} dari {{ $data->total() }} data
                                </small>
                                <div class="mt-2 mt-sm-0">
                                    {{ $data->appends(Request::except('page'))->links() }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
