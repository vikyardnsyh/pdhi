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
                    <h4>Administrasi Pendaftaran Anggota</h4>

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
                                    <th scope="col">Kelengkapan Berkas</th>
                                    <th scope="col">Form Pendaftaran</th>
                                    <th scope="col">Status Verifikasi</th>
                                    <th scope="col">Verifikasi Pendaftaran</th>
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
                                        <td>dummy</td>
                                        <td>dummy</td>
                                        <td><a class="btn btn-primary" href="{{ url('AdminAkun/' . $value[0]->id_dokter . '/edit') }}"
                                                data-toggle="tooltip" data-placement="top" title
                                                data-original-title="Lihat Berkas"><i class="far fa-eye"></i></a></td>
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
