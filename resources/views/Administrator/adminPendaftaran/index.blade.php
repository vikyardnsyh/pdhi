@extends('layouts.administrator')
@section('title', 'Administrasi Pendaftaran')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Administrasi Pendaftaran</h1>
                <small class="text-muted">Verifikasi pendaftaran anggota baru dan kelengkapan berkas</small>
            </div>
        </div>

        <div class="card card-primary shadow-sm mb-4">
            <div class="card-header-responsive border-bottom">
                <h4 class="text-dark font-weight-bold">
                    <i class="fas fa-clipboard-list text-primary mr-2"></i> Daftar Pengajuan Pendaftaran
                </h4>
                <div class="card-header-action">
                    <form action="{{ url('adminPendaftaran/') }}" method="GET" class="d-flex align-items-center gap-1">
                        <div class="input-group">
                            <input type="search" class="form-control" name="cariDokter" value="{{ request('cariDokter') }}" placeholder="Cari nama dokter...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary" title="Cari"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <a class="btn btn-outline-secondary ml-1" href="{{ url('/adminPendaftaran') }}" role="button" title="Reset Pencarian">
                        <i class="fas fa-undo"></i>
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-control-bar">
                    <div class="table-control-tools">
                        <form action="{{ url('adminPendaftaran/') }}" method="GET">
                            <div class="btn-group" role="group">
                                <button class="btn btn-sm {{ !request('terverifikasi') && !request('tinjau') ? 'btn-primary' : 'btn-outline-primary' }}" type="submit" name="semua" value="semua">Semua</button>
                                <button class="btn btn-sm {{ request('terverifikasi') ? 'btn-success' : 'btn-outline-success' }}" type="submit" name="terverifikasi" value="terverifikasi">Terverifikasi</button>
                                <button class="btn btn-sm {{ request('tinjau') ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" name="tinjau" value="tinjau">Perlu Ditinjau</button>
                            </div>
                        </form>
                    </div>
                    <div class="table-control-count">
                        Total ditemukan: <span class="badge badge-light border ml-1">{{ $data->total() }} pendaftaran</span>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th class="text-left">Nama Lengkap</th>
                                <th>Kelengkapan Berkas</th>
                                <th>Form Pendaftaran</th>
                                <th>Status Verifikasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $n = 0; @endphp
                            @forelse ($data as $key => $value)
                            <tr class="text-center">
                                <td>{{ ++$n }}</td>
                                <td class="text-left font-weight-600 text-dark">{{ $value[0]->nama_lengkap }}</td>
                                <td>
                                    @if (count($value) == '8')
                                        <span class="badge badge-success"><i class="fas fa-check mr-1"></i> Lengkap (8/8)</span>
                                    @else
                                        <span class="badge badge-danger"><i class="fas fa-exclamation-triangle mr-1"></i> Belum Lengkap ({{ count($value) }}/8)</span>
                                    @endif
                                </td>
                                <td>
                                    @if (is_null($value[0]->nama_panggilan))
                                        <span class="badge badge-danger"><i class="fas fa-times mr-1"></i> Belum Diisi</span>
                                    @else
                                        <span class="badge badge-success"><i class="fas fa-check mr-1"></i> Sudah Diisi</span>
                                    @endif
                                </td>
                                <td>
                                    @if (is_null($value[0]->tanggal_terdaftar))
                                        <span class="badge badge-warning"><i class="fas fa-clock mr-1"></i> Perlu Ditinjau</span>
                                    @else
                                        <span class="badge badge-primary"><i class="fas fa-check-circle mr-1"></i> Terverifikasi</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ url('adminPendaftaran/' . $value[0]->id . '/edit') }}" title="Halaman Verifikasi">
                                        <i class="far fa-edit mr-1"></i> Verifikasi
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="table-empty-state">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-inbox"></i>
                                    </div>
                                    <p class="empty-state-text">Tidak ada data pendaftaran ditemukan.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between align-items-center flex-wrap mt-3 pt-2 border-top">
                    <small class="text-muted">
                        Menampilkan halaman {{ $data->currentPage() }} dari {{ $data->lastPage() }}
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
