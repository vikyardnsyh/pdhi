@extends('layouts.administrator')
@section('title', 'Laporan')
@section('sidebar')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan</h1>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Download File Laporan</h4>
            </div>
            <div class="card-body">
                <div class="row justify-content-around">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Seluruh Data Anggota</h4>
                                <div class="card-header-action">
                                    <form action="{{ url('/adminLaporan/export') }}" method="GET">
                                        <button class="btn btn-sm btn-primary" type="submit" name="anggota" data-toggle="tooltip" data-placement="top" title data-original-title="Unduh Laporan"><i class="fa fa-download fa-2x"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Seluruh Data Non-Anggota</h4>
                                <div class="card-header-action">
                                    <form action="{{ url('/adminLaporan/export') }}" method="GET">
                                        <button class="btn btn-sm btn-primary" type="submit" name="nonanggota" data-toggle="tooltip" data-placement="top" title data-original-title="Unduh Laporan"><i class="fa fa-download fa-2x"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-sm-7 col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Data Berkas Dokter</h4>
                        <div class="card-header-action">
                            <div class="row ml-1">
                                <form action="{{ url('adminLaporan/') }}" method="GET">
                                    <div class="input-group">
                                        <input type="search" class="form-control" name="cariDokter" placeholder="Cari Nama Dokter">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <a class="btn btn-primary" href="/adminLaporan" role="button" data-toggle="tooltip" data-placement="top" title data-original-title="Reset Pencarian"><i class="fa fa-power-off"></i></a>
                            </div>
                        </div>
                    </div>
                    @if(is_null($data))
                    <div class="text-center mt-3">
                        <p><b>Input nama dokter di kolom pencarian</b></p>
                    </div>
                    @else
                    <div class="card-body">
                        <table class="table table-responsive table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Status Anggota</th>
                                    <th scope="col">Download Berkas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                <tr class="text-center">
                                    <td>{{ $data->firstItem() + $key }}</td>
                                    <td>{{ $value->nama_lengkap }}</td>
                                    <td>{{ $value->username }}</td>
                                    <td>
                                        @php
                                        date_default_timezone_set('Asia/jakarta');
                                        $now = new DateTime(date('Y-M-d'));
                                        $expired = new DateTime($value->masa_aktif);
                                        if(is_null($value->masa_aktif)) {
                                        $status = '<span class="badge badge-pill badge-danger">Belum Terdaftar</span>';
                                        } else{
                                        if ($now > $expired) {
                                        $status = '<span class="badge badge-pill badge-secondary">Non Aktif</span>';
                                        } else {
                                        $status = '<span class="badge badge-pill badge-success">Aktif</span>';
                                        }
                                        }
                                        @endphp
                                        {!! $status !!}
                                    </td>
                                    <td>
                                        <form action="{{ url('/adminLaporan/generate-pdf') }}" method="GET">
                                            @csrf
                                            <input type="hidden" value="{{ $value->id }}" name="id">
                                            <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Berkas Dokter">
                                                <i class="fa fa-download" style="color:white"></i>
                                            </button>
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
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection