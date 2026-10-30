@extends('layouts.administrator')
@section('title', 'Administrasi Data Dokter')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Administrasi Data Dokter</h1>
                <small class="text-muted">Kelola data seluruh dokter hewan anggota maupun calon anggota</small>
            </div>
        </div>

        <div class="card card-primary shadow-sm mb-4">
            {{-- Responsive Header with Search and Reset --}}
            <div class="card-header-responsive border-bottom">
                <h4 class="text-dark font-weight-bold">
                    <i class="fas fa-user-md text-primary mr-2"></i> Daftar Data Dokter
                </h4>
                <div class="card-header-action">
                    <form action="{{ url('adminDokter/') }}" method="GET" class="d-flex align-items-center gap-1">
                        <div class="input-group">
                            <input type="search" class="form-control" name="cariDokter" value="{{ request('cariDokter') }}" placeholder="Cari nama dokter...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary" title="Cari"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <a class="btn btn-outline-secondary ml-1" href="{{ url('/adminDokter') }}" role="button" title="Reset Pencarian">
                        <i class="fas fa-undo"></i>
                    </a>
                </div>
            </div>

            <div class="card-body">
                {{-- Filter & Count Row --}}
                <div class="table-control-bar">
                    <div class="table-control-tools">
                        <form action="{{ url('adminDokter/') }}" method="GET">
                            <div class="btn-group" role="group">
                                <button class="btn btn-sm {{ !request('terdaftar') && !request('belumterdaftar') ? 'btn-primary' : 'btn-outline-primary' }}" type="submit" name="semua" value="semua">Semua</button>
                                <button class="btn btn-sm {{ request('terdaftar') ? 'btn-success' : 'btn-outline-success' }}" type="submit" name="terdaftar" value="terdaftar">Terdaftar</button>
                                <button class="btn btn-sm {{ request('belumterdaftar') ? 'btn-danger' : 'btn-outline-danger' }}" type="submit" name="belumterdaftar" value="belumterdaftar">Belum Terdaftar</button>
                            </div>
                        </form>
                    </div>
                    <div class="table-control-count">
                        Total ditemukan: <span class="badge badge-light border ml-1">{{ $data->total() }} dokter</span>
                    </div>
                </div>

                {{-- Freeze / Sticky Columns Table --}}
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-freeze-dokter">
                        <thead>
                            <tr class="text-center">
                                <th class="sticky-col-1 col-doctor-no">No</th>
                                <th class="text-left sticky-col-2 col-doctor-name">Nama Lengkap</th>
                                <th class="sticky-col-3 col-doctor-status">Status</th>
                                <th class="sticky-col-4 col-doctor-action">Aksi</th>
                                <th>Panggilan</th>
                                <th>Tempat Lahir</th>
                                <th>Tgl Lahir</th>
                                <th>Gender</th>
                                <th>Alumni</th>
                                <th>Tahun</th>
                                <th>No. Telp</th>
                                <th>Email</th>
                                <th>Bidang Kerja</th>
                                <th>Klinik / Instansi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key => $value)
                            <tr class="text-center">
                                <td class="sticky-col-1 col-doctor-no font-weight-bold">{{ $data->firstItem() + $key }}</td>
                                <td class="text-left font-weight-bold text-dark sticky-col-2 col-doctor-name">{{ $value->nama_lengkap }}</td>
                                <td class="sticky-col-3 col-doctor-status">
                                    @if (is_null($value->tanggal_terdaftar))
                                        <span class="badge badge-danger">Belum Terdaftar</span>
                                    @else
                                        <span class="badge badge-success">Terdaftar</span>
                                    @endif
                                </td>
                                <td class="sticky-col-4 col-doctor-action">
                                    <a class="btn btn-sm btn-info" href="{{ url('adminDokter/' . $value->id . '/edit') }}" title="Lihat Profil Lengkap">
                                        <i class="far fa-eye mr-1"></i> Detail
                                    </a>
                                </td>
                                <td>{{ $value->nama_panggilan ?? '-' }}</td>
                                <td>{{ $value->tempat_lahir ?? '-' }}</td>
                                <td>{{ !empty($value->tanggal_lahir) ? date('d-M-Y', strtotime($value->tanggal_lahir)) : '-' }}</td>
                                <td>{{ $value->jenis_kelamin ?? '-' }}</td>
                                <td>{{ $value->alumni ?? '-' }}</td>
                                <td>{{ $value->tahun_alumni ?? '-' }}</td>
                                <td>{{ $value->no_telp ?? '-' }}</td>
                                <td>{{ $value->email ?? '-' }}</td>
                                <td>{{ $value->bidang_kerja ?? '-' }}</td>
                                <td>{{ $value->nama_klinik ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="14" class="table-empty-state">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-folder-open"></i>
                                    </div>
                                    <p class="empty-state-text">Tidak ada data dokter ditemukan.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="d-flex justify-content-between align-items-center flex-wrap mt-3 pt-2 border-top">
                    <small class="text-muted">
                        Menampilkan {{ $data->firstItem() ?? 0 }} - {{ $data->lastItem() ?? 0 }} dari {{ $data->total() }} data
                    </small>
                    <div class="mt-2 mt-sm-0">
                        {{ $data->appends(Request::except('page'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
