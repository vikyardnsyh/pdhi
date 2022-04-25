@extends('layouts.administrator')
@section('title', 'Administrasi Anggota')
@section('sidebar')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Administrasi Anggota</h1>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Data Anggota</h4>
                    <div class="card-header-action">
                        <form action="{{ url('/adminKeanggotaan') }}" method="GET">
                            <div class="input-group">
                                <input type="search" class="form-control" name="cariDokter" placeholder="Cari Nama Dokter">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center">
                        <a class="btn btn-primary" href="/adminKeanggotaan" role="button" data-toggle="tooltip"
                            data-placement="top" title data-original-title="Reset Pencarian"><i
                                class="fa fa-power-off"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('/adminKeanggotaan') }}" method="GET">
                        <div class="btn-group float-right mb-2">
                            <button class="btn btn-sm btn-light" type="submit" name="semua"
                                value="semua">Semua</button>
                            <button class="btn btn-sm btn-light" type="submit" name="aktif"
                                value="aktif">Aktif</button>
                            <button class="btn btn-sm btn-light" type="submit" name="nonaktif"
                                value="nonaktif">Non Aktif</button>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status Keanggotaan</th>
                                    <th scope="col">Tanggal Terdaftar</th>
                                    <th scope="col">Masa Aktif</th>
                                    <th scope="col">Domisili Keanggotaan</th>
                                    <th scope="col">Perpanjang?</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td class="text-left">{{ $value->nama_lengkap }}</td>
                                        <td>{{ $value->no_telp }}</td>
                                        <td>{{ $value->email }}</td>
                                        
                                        {{-- @if($value->tanggal_terdaftar ) --}}
                                        @php
                                         date_default_timezone_set('Asia/jakarta');
                                         $now = new DateTime(date('Y-M-d'));
                                         $expired = new DateTime($value->masa_aktif);

                                         if ($now > $expired) {
                                             $status = 'Non Aktif';
                                         } else {
                                            $status = 'Aktif';
                                         }
                                        @endphp
                                        <td>{{$status}}</td>

                                        @if(is_null($value->tanggal_terdaftar))
                                        <td>-</td>
                                        @else
                                        <td>{{ date('d-M-Y', strtotime($value->tanggal_terdaftar)) }}</td>
                                        @endif

                                        @if(is_null($value->masa_aktif))
                                        <td>-</td>
                                        @else
                                        <td>{{ date('d-M-Y', strtotime($value->masa_aktif)) }}</td>
                                        @endif

                                        @if(is_null($value->domisili_anggota))
                                        <td>-</td>
                                        @else
                                        <td>{{$value->domisili_anggota}}</td>
                                        @endif
                                        
                                        <td><a class="btn btn-primary" href="" data-toggle="tooltip" data-placement="top"
                                                title data-original-title="Lihat Berkas"><i class="far fa-edit"></i></a>
                                        </td>
                                        {{-- <td><a class="btn btn-primary"
                                            href="{{ url('AdminAkun/' . $value->username . '/edit') }}"
                                            data-toggle="tooltip" data-placement="top" title
                                            data-original-title="Edit Data Akun"><i class="far fa-edit"></i></a></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
