@extends('layouts.administrator')
@section('title', 'Administrasi Anggota')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Administrasi Anggota</h1>
                <small class="text-muted">Kelola masa aktif dan domisili keanggotaan dokter</small>
            </div>
        </div>

        <div class="card card-primary shadow-sm mb-4">
            <div class="card-header-responsive border-bottom">
                <h4 class="text-dark font-weight-bold">
                    <i class="fas fa-id-card-alt text-primary mr-2"></i> Data Keanggotaan Dokter
                </h4>
                <div class="card-header-action">
                    <form action="{{ url('/adminKeanggotaan') }}" method="GET" class="d-flex align-items-center gap-1">
                        <div class="input-group">
                            <input type="search" class="form-control" name="cariDokter" value="{{ request('cariDokter') }}" placeholder="Cari nama dokter...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary" title="Cari"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <a class="btn btn-outline-secondary ml-1" href="{{ url('/adminKeanggotaan') }}" role="button" title="Reset Pencarian">
                        <i class="fas fa-undo"></i>
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-control-bar">
                    <div class="table-control-tools">
                        <form action="{{ url('/adminKeanggotaan') }}" method="GET">
                            <div class="btn-group" role="group">
                                <button class="btn btn-sm {{ !request('aktif') && !request('nonaktif') ? 'btn-primary' : 'btn-outline-primary' }}" type="submit" name="semua" value="semua">Semua</button>
                                <button class="btn btn-sm {{ request('aktif') ? 'btn-success' : 'btn-outline-success' }}" type="submit" name="aktif" value="aktif">Aktif</button>
                                <button class="btn btn-sm {{ request('nonaktif') ? 'btn-danger' : 'btn-outline-danger' }}" type="submit" name="nonaktif" value="nonaktif">Non Aktif</button>
                            </div>
                        </form>
                    </div>
                    <div class="table-control-count">
                        Total ditemukan: <span class="badge badge-light border ml-1">{{ $data->total() }} anggota</span>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th class="text-left">Nama Lengkap</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Tgl Terdaftar</th>
                                <th>Masa Aktif</th>
                                <th>Domisili</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key => $value)
                            <tr class="text-center">
                                <td>{{ $data->firstItem() + $key }}</td>
                                <td class="text-left font-weight-600 text-dark">{{ $value->nama_lengkap }}</td>
                                <td>{{ $value->no_telp ?? '-' }}</td>
                                <td>{{ $value->email ?? '-' }}</td>

                                @php
                                date_default_timezone_set('Asia/Jakarta');
                                $now = new DateTime(date('Y-m-d'));
                                $expired = !empty($value->masa_aktif) ? new DateTime($value->masa_aktif) : null;

                                if (is_null($expired)) {
                                    $status = '<span class="badge badge-secondary">Belum Diatur</span>';
                                } elseif ($now > $expired) {
                                    $status = '<span class="badge badge-danger">Non Aktif</span>';
                                } else {
                                    $status = '<span class="badge badge-success">Aktif</span>';
                                }
                                @endphp
                                <td>{!! $status !!}</td>

                                <td>{{ !empty($value->tanggal_terdaftar) ? date('d-M-Y', strtotime($value->tanggal_terdaftar)) : '-' }}</td>
                                <td>{{ !empty($value->masa_aktif) ? date('d-M-Y', strtotime($value->masa_aktif)) : '-' }}</td>
                                <td class="text-capitalize">{{ $value->domisili_anggota ?? '-' }}</td>

                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ url('adminKeanggotaan/' . $value->id . '/edit') }}" title="Perpanjang / Ubah Status">
                                        <i class="far fa-edit mr-1"></i> Kelola
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="table-empty-state">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-users-slash"></i>
                                    </div>
                                    <p class="empty-state-text">Tidak ada data anggota ditemukan.</p>
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
            </div>
        </div>
    </section>
</div>
@endsection
