@extends('layouts.administrator')
@section('title', 'Administrasi Dokter')
@section('sidebar')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Administrasi Dokter</h1>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Tabel Data Dokter</h4>

                <div class="card-header-action">
                    <form action="{{ url('adminDokter/') }}" method="GET">
                        <div class="input-group">
                            <input type="search" class="form-control" name="cariDokter" placeholder="Cari Nama Dokter">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-flex align-items-center">
                    <a class="btn btn-primary" href="/adminDokter" role="button" data-toggle="tooltip" data-placement="top" title data-original-title="Reset Pencarian"><i class="fa fa-power-off"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <form action="{{ url('adminDokter/') }}" method="GET">
                            <div class="btn-group float-right mb-2">
                                <button class="btn btn-sm btn-light" type="submit" name="semua" value="semua">Semua</button>
                                <button class="btn btn-sm btn-light" type="submit" name="terdaftar" value="terdaftar">Terdaftar</button>
                                <button class="btn btn-sm btn-light" type="submit" name="belumterdaftar" value="belumterdaftar">Belum Terdaftar</button>
                            </div>
                        </form>
                    </div>
                    <div class="col d-flex justify-content-end">
                        Total data ditemukan : {{ $data->total() }}
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col-md-15">No</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tampilan Profil</th>
                                <th scope="col">Nama Panggilan</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alumni</th>
                                <th scope="col">Tahun Alumni</th>
                                <th scope="col">Nama Pasangan</th>
                                <th scope="col">Alamat Rumah</th>
                                <th scope="col">No. Telp</th>
                                <th scope="col">Email</th>
                                <th scope="col">Bidang Kerja Vet.</th>
                                <th scope="col">Nama Klinik</th>
                                <th scope="col">Alamat Klinik</th>
                                <th scope="col">No. / Fax Klinik</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $value)
                            <tr>
                                <td>{{ $data->firstItem() + $key }}</td>
                                <td class="text-left">{{ $value->nama_lengkap }}</td>
                                @if (is_null($value->tanggal_terdaftar))
                                <td class="text-center"><span class="badge badge-pill badge-danger">Belum
                                        Terdaftar</span></td>
                                @else
                                <td class="text-center"><span class="badge badge-pill badge-success">Terdaftar</span></td>
                                @endif

                                <td><a class="btn btn-primary" href="{{ url('adminDokter/' . $value->id . '/edit') }}" data-toggle="tooltip" data-placement="top" title data-original-title="Lihat Detail Dokter"><i class="far fa-eye"></i></a>
                                </td>

                                @if (is_null($value->nama_panggilan))
                                <td class="text-center">-</td>
                                @else
                                <td class="text-center">{{ $value->nama_panggilan }}</td>
                                @endif

                                @if (is_null($value->tempat_lahir))
                                <td class="text-center">-</td>
                                @else
                                <td class="text-center">{{ $value->tempat_lahir }}</td>
                                @endif

                                @if (is_null($value->tanggal_lahir))
                                <td class="text-center">-</td>
                                @else
                                <td class="text-center">
                                    {{ date('d-M-Y', strtotime($value->tanggal_lahir)) }}
                                </td>
                                @endif

                                @if (is_null($value->jenis_kelamin))
                                <td class="text-center">-</td>
                                @else
                                <td class="text-center">{{ $value->jenis_kelamin }}</td>
                                @endif

                                @if (is_null($value->alumni))
                                <td class="text-center">-</td>
                                @else
                                <td class="text-center">{{ $value->alumni }}</td>
                                @endif

                                @if (is_null($value->tahun_alumni))
                                <td class="text-center">-</td>
                                @else
                                <td class="text-center">{{ $value->tahun_alumni }}</td>
                                @endif

                                @if (is_null($value->nama_pasangan))
                                <td class="text-center">-</td>
                                @else
                                <td class="text-center">{{ $value->nama_pasangan }}</td>
                                @endif

                                @if (is_null($value->alamat_rumah))
                                <td class="text-left" style="width: 90px;">-</td>
                                @else
                                <td class="text-left" style="width: 90px;">{{ $value->alamat_rumah }}
                                </td>
                                @endif

                                @if (is_null($value->no_telp))
                                <td class="text-center">-</td>
                                @else
                                <td class="text-center">{{ $value->no_telp }}</td>
                                @endif

                                @if (is_null($value->email))
                                <td class="text-center">-</td>
                                @else
                                <td class="text-center">{{ $value->email }}</td>
                                @endif

                                @if (is_null($value->bidang_kerja))
                                <td class="text-center">-</td>
                                @else
                                <td class="text-center">{{ $value->bidang_kerja }}</td>
                                @endif

                                @if (is_null($value->nama_klinik))
                                <td class="text-center">-</td>
                                @else
                                <td class="text-center">{{ $value->nama_klinik }}</td>
                                @endif

                                @if (is_null($value->alamat_klinik))
                                <td class="text-center">-</td>
                                @else
                                <td class="text-center">{{ $value->alamat_klinik }}</td>
                                @endif

                                @if (is_null($value->no_telp_klinik))
                                <td class="text-center">-</td>
                                @else
                                <td class="text-center">{{ $value->no_telp_klinik }}</td>
                                @endif
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
    </section>
</div>
@endsection