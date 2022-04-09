@extends('layouts.administrator')
@section('title', 'Berkas Anggota')
@section('sidebar')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Berkas Anggota</h1>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Berkas Anggota</h4>

                    <div class="card-header-action">
                        <form action="{{ url('adminBerkas/') }}" method="GET">
                            <div class="input-group">
                                <input type="search" class="form-control" name="cariDokter" placeholder="Cari Nama Dokter">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center">
                        <a class="btn btn-primary" href="/adminBerkas" role="button" data-toggle="tooltip"
                            data-placement="top" title data-original-title="Reset Pencarian"><i
                                class="fa fa-power-off"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Ijazah Drh. (Legalisir)</th>
                                    <th scope="col">Pas Foto</th>
                                    <th scope="col">KTP</th>
                                    <th scope="col">KTA</th>
                                    <th scope="col">STRV</th>
                                    <th scope="col">SKDHI</th>
                                    <th scope="col">Bukti Tf. Pendaftaran</th>
                                    <th scope="col">Bukti Tf. Keanggotaan</th>
                                    <th scope="col">Tanggal Terdaftar</th>
                                    <th scope="col">Verifikasi (Show All Berkas & form aktivasi)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                    {{-- @if ($value->status_pengguna === 1)
                                    @php $status = '<span class="badge badge-pill badge-success">Aktif</span>' @endphp
                                @elseif ($value->status_pengguna === 2)
                                    @php $status = '<span class="badge badge-pill badge-danger">Non Aktif</span>' @endphp
                                @endif
                                @if ($value->id_kelas_pengguna === 1)
                                    @php $kelas = "User" @endphp
                                @elseif ($value->id_kelas_pengguna === 2)
                                    @php $kelas = "Admin" @endphp
                                @endif --}}
                                    <tr class="text-center">
                                        <td>{{ ++$key }}</td>
                                        <td class="text-left">{{ $value->nama_lengkap }}</td>
                                        <td><span class="badge badge-success"><i class="fa fa-check"></i></span></td>
                                        <td><span class="badge badge-success"><i class="fa fa-check"></i></span></td>
                                        <td><span class="badge badge-success"><i class="fa fa-check"></i></span></td>
                                        <td><span class="badge badge-success"><i class="fa fa-check"></i></span></td>
                                        <td><span class="badge badge-success"><i class="fa fa-check"></i></span></td>
                                        <td><span class="badge badge-success"><i class="fa fa-check"></i></span></td>
                                        <td><span class="badge badge-success"><i class="fa fa-check"></i></span></td>
                                        <td><span class="badge badge-success"><i class="fa fa-check"></i></span></td>
                                        <td><span class="badge badge-danger"><i class="fa fa-times"></i></span></td>
                                        
                                        <td><a class="btn btn-primary" href="{{ url('AdminAkun/' . $value->username . '/edit') }}"
                                                data-toggle="tooltip" data-placement="top" title
                                                data-original-title="Verifikasi Keanggotaan"><i class="far fa-edit"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </section>
    </div>

@endsection
