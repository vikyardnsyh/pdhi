@extends('layouts.administrator')
@section('title', 'Administrasi Akun')
@section('sidebar')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Administrasi Akun</h1>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Tabel Akun Dokter</h4>
                <div class="card-header-action">
                    <form action="{{ url('AdminAkun/') }}" method="GET">
                        <div class="input-group">
                            <input type="search" class="form-control" name="cariAkun" placeholder="Cari username">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-flex align-items-center">
                    <a class="btn btn-primary" href="/AdminAkun" role="button" data-toggle="tooltip" data-placement="top" title data-original-title="Reset Pencarian"><i class="fa fa-power-off"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <form action="{{ url('/AdminAkun') }}" method="GET">
                            <div class="btn-group float-right mb-2">
                                <button class="btn btn-sm btn-light" type="submit" name="semua" value="semua">Semua</button>
                                <button class="btn btn-sm btn-light" type="submit" name="admin" value="admin">Admin</button>
                                <button class="btn btn-sm btn-light" type="submit" name="user" value="user">User</button>
                            </div>
                        </form>
                        <div class="vl"></div>
                        <div class="btn-group float-right mb-2">
                            <a class="btn btn-sm btn-primary" href="/AdminAkun/create" role="button">Tambah Akun</a>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-end">
                        Total data ditemukan : {{ $data->total()}}
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Username</th>
                            <th scope="col">Kelas Akun</th>
                            <th scope="col">Status Akun</th>
                            <th colspan="3" scope="colgroup" class="text-center">Pengaturan Akun</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $value)
                        @if ($value->status_pengguna === 1)
                        @php $status = '<span class="badge badge-pill badge-success">Aktif</span>' @endphp
                        @elseif ($value->status_pengguna === 2)
                        @php $status = '<span class="badge badge-pill badge-danger">Non Aktif</span>' @endphp
                        @endif
                        @if ($value->id_kelas_pengguna === 1)
                        @php $kelas = "User" @endphp
                        @elseif ($value->id_kelas_pengguna === 2)
                        @php $kelas = "Admin" @endphp
                        @endif
                        <tr>
                            <td>{{ $data->firstItem() + $key }}</td>
                            <td>{{ $value->nama_lengkap }}</td>
                            <td>{{ $value->username }}</td>
                            <td>{{ $kelas }}</td>
                            <td>{!! $status !!}</td>
                            <td>
                                <a class="btn btn-primary mr-n5" href="{{ url('AdminAkun/' . $value->username . '/edit') }}" data-toggle="tooltip" data-placement="top" title data-original-title="Edit Data Akun">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form method="GET" action="{{ url('AdminAkun/resetPassword') }}">
                                    @csrf
                                    <input type="hidden" value="{{$value->username}}" name="username">
                                    <button class="btn btn-primary show-alert-password-confirm" type="submit" data-toggle="tooltip" data-placement="top" title data-original-title="Reset Password">
                                        <i class="fas fa-key"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ url('AdminAkun/' . $value->username) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger ml-n5 show-alert-delete-confirm" type="submit" data-toggle="tooltip" data-placement="top" title data-original-title="Hapus Data Akun" title="Delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex">
                    {{ $data->appends(Request::except('page'))->links() }}
                </div>
            </div>
        </div>
</div>
</div>
</section>
</div>

@endsection