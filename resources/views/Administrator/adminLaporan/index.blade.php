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
                <div class="row">
                    <div class="col-6 col-md-6 col-lg-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Seluruh Data Anggota</h4>
                                <div class="card-header-action">
                                    <a href="/adminLaporan/export" name='anggota' class="btn btn-primary mb-3 mr-3 ml-3" target="_blank"><i class="fa fa-download fa-2x" style="color:white" data-toggle="tooltip" data-placement="top" title data-original-title="Unduh Laporan"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Seluruh Data Non-Anggota</h4>
                                <div class="card-header-action">
                                    <a href="/adminLaporan/export" name='nonanggota' class="btn btn-primary mb-3 mr-3 ml-3" target="_blank"><i class="fa fa-download fa-2x" style="color:white" data-toggle="tooltip" data-placement="top" title data-original-title="Unduh Laporan"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Data Berkas Dokter</h4>
                                <div class="card-header-action">
                                    <form action="{{ url('adminLaporan/') }}" method="GET">
                                        <div class="input-group">
                                            <input type="search" class="form-control" name="cariDokter" placeholder="Cari nama dokter">
                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <a class="btn btn-primary" href="/adminLaporan" role="button" data-toggle="tooltip" data-placement="top" title data-original-title="Reset Pencarian"><i class="fa fa-power-off"></i></a>
                            </div>
                            @if(is_null($data))
                            <div class="text-center mt-3">
                                <p><b>Input nama dokter di kolom pencarian</b></p>
                            </div>
                            @else
                            <div class="card-body">
                                <table class="table table-hover table-sm">

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
            </div>
        </div>
    </section>
</div>
@endsection