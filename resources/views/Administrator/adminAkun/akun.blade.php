@extends('layouts.administrator')
@section('title', 'Administrasi Data Akun')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Administrasi Data Akun</h1>
                <small class="text-muted">Kelola akun pengguna, hak akses administrator, dan reset kata sandi</small>
            </div>
        </div>

        <div class="card card-primary shadow-sm mb-4">
            <div class="card-header-responsive border-bottom">
                <h4 class="text-dark font-weight-bold">
                    <i class="fas fa-users-cog text-primary mr-2"></i> Daftar Akun Pengguna
                </h4>
                <div class="card-header-action">
                    <form action="{{ url('AdminAkun/') }}" method="GET" class="d-flex align-items-center gap-1">
                        <div class="input-group">
                            <input type="search" class="form-control" name="cariAkun" value="{{ request('cariAkun') }}" placeholder="Cari username...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary" title="Cari"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <a class="btn btn-outline-secondary ml-1" href="{{ url('/AdminAkun') }}" role="button" title="Reset Pencarian">
                        <i class="fas fa-undo"></i>
                    </a>
                </div>
            </div>

            <div class="card-body">
                {{-- Filters and Add Account Button Row --}}
                <div class="table-control-bar">
                    <div class="table-control-tools">
                        <form action="{{ url('/AdminAkun') }}" method="GET" class="d-inline">
                            <div class="btn-group" role="group">
                                <button class="btn btn-sm {{ !request('admin') && !request('user') ? 'btn-primary' : 'btn-outline-primary' }}" type="submit" name="semua" value="semua">Semua</button>
                                <button class="btn btn-sm {{ request('admin') ? 'btn-primary' : 'btn-outline-primary' }}" type="submit" name="admin" value="admin">Admin</button>
                                <button class="btn btn-sm {{ request('user') ? 'btn-primary' : 'btn-outline-primary' }}" type="submit" name="user" value="user">User</button>
                            </div>
                        </form>
                        <a class="btn btn-sm btn-success" href="{{ url('/AdminAkun/create') }}" role="button">
                            <i class="fas fa-plus mr-1"></i> Tambah Akun
                        </a>
                    </div>
                    <div class="table-control-count">
                        Total ditemukan: <span class="badge badge-light border ml-1">{{ $data->total() }} akun</span>
                    </div>
                </div>

                {{-- Responsive Table --}}
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th class="text-left">Nama Lengkap</th>
                                <th>Username</th>
                                <th>Hak Akses</th>
                                <th>Status</th>
                                <th>Aksi Pengaturan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key => $value)
                            @php
                                $statusBadge = ($value->status_pengguna === 1)
                                    ? '<span class="badge badge-success">Aktif</span>'
                                    : '<span class="badge badge-danger">Non Aktif</span>';
                                $kelasLabel = ($value->id_kelas_pengguna === 2)
                                    ? '<span class="badge badge-primary"><i class="fas fa-user-shield mr-1"></i> Admin</span>'
                                    : '<span class="badge badge-light border"><i class="fas fa-user mr-1"></i> User</span>';
                            @endphp
                            <tr class="text-center">
                                <td>{{ $data->firstItem() + $key }}</td>
                                <td class="text-left font-weight-600 text-dark">{{ $value->nama_lengkap }}</td>
                                <td><code>{{ $value->username }}</code></td>
                                <td>{!! $kelasLabel !!}</td>
                                <td>{!! $statusBadge !!}</td>
                                <td>
                                    {{-- Monotone Cluster Action with Pipe Separator --}}
                                    <div class="action-cluster">
                                        {{-- Edit Account --}}
                                        <a href="{{ url('AdminAkun/' . $value->username . '/edit') }}" 
                                           class="action-cluster-btn btn-action-edit" 
                                           data-toggle="tooltip" 
                                           data-placement="top" 
                                           title="Edit Akun">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <span class="action-cluster-sep">|</span>

                                        {{-- Reset Password --}}
                                        <form method="GET" action="{{ url('AdminAkun/resetPassword') }}" class="d-inline m-0 p-0">
                                            @csrf
                                            <input type="hidden" value="{{ $value->username }}" name="username">
                                            <button type="submit" 
                                                    class="action-cluster-btn btn-action-reset show-alert-password-confirm" 
                                                    data-toggle="tooltip" 
                                                    data-placement="top" 
                                                    title="Reset Password">
                                                <i class="fas fa-key"></i>
                                            </button>
                                        </form>

                                        <span class="action-cluster-sep">|</span>

                                        {{-- Delete Account --}}
                                        <form action="{{ url('AdminAkun/' . $value->username) }}" method="POST" class="d-inline m-0 p-0">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" 
                                                    class="action-cluster-btn btn-action-delete show-alert-delete-confirm" 
                                                    data-toggle="tooltip" 
                                                    data-placement="top" 
                                                    title="Hapus Akun">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="table-empty-state">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-user-slash"></i>
                                    </div>
                                    <p class="empty-state-text">Tidak ada data akun ditemukan.</p>
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
