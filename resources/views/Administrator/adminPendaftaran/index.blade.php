@extends('layouts.administrator')
@section('title', 'Administrasi Pendaftaran')
@section('sidebar')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Administrasi Pendaftaran</h1>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Administrasi Pendaftaran Anggota</h4>
                    <div class="card-header-action">
                        <form action="{{ url('adminPendaftaran/') }}" method="GET">
                            @csrf
                            <div class="input-group">
                                <input type="search" class="form-control" name="cariDokter" placeholder="Cari Nama Dokter">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center">
                        <a class="btn btn-primary" href="/adminPendaftaran" role="button" data-toggle="tooltip"
                            data-placement="top" title data-original-title="Reset Pencarian"><i
                                class="fa fa-power-off"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('adminPendaftaran/') }}" method="GET">
                    <div class="btn-group float-right mb-2">
                        <button class="btn btn-sm btn-light" type="submit" name="semua" value="semua">Semua</button>
                        <button class="btn btn-sm btn-light" type="submit" name="terverifikasi" value="terverifikasi">Terverifikasi</button>
                        <button class="btn btn-sm btn-light" type="submit" name="tinjau" value="tinjau">Perlu Ditinjau</button>
                    </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Kelengkapan Berkas</th>
                                    <th scope="col">Form Pendaftaran</th>
                                    <th scope="col">Status Verifikasi</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n = 0;
                                    @endphp
                                @foreach ($data as $key=>$value)
                                    <tr class="text-center">
                                        <td>{{ ++$n }}</td>
                                        <td class="text-left">{{ $key }}</td>
                                        @if(count($value) == '8')
                                            <td><span class="badge badge-pill badge-success">Lengkap</span></td>
                                            @else
                                                <td><span class="badge badge-pill badge-danger">Belum Lengkap</span></td>
                                        @endif
                                        @if(is_null($value[0]->nama_panggilan))
                                            <td><span class="badge badge-pill badge-danger">Belum Diisi</span></td>
                                            @else
                                                <td><span class="badge badge-pill badge-success">Sudah Diisi</span></td>
                                        @endif
                                        @if(is_null($value[0]->tanggal_terdaftar))
                                            <td><span class="badge badge-pill badge-warning">Perlu Ditinjau</span></td>
                                            @else
                                                <td><span class="badge badge-pill badge-primary">Terverifikasi</span></td>
                                        @endif
                                        <td><a class="btn btn-primary" href="{{ url('adminPendaftaran/' . $value[0]->id . '/edit') }}"
                                                data-toggle="tooltip" data-placement="top" title
                                                data-original-title="Verifikasi Pendaftaran"><i class="far fa-edit"></i></a></td>
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
