@extends('layouts.administrator')
@section('title', 'Detail Dokter')
@section('sidebar')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Dokter</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    @foreach ($DataDokter as $key => $value)
                        <div class="row">
                            <div class="col-12 col-sm-12 col-lg-7">
                                <div class="card profile-widget card-primary shadow p-3 mb-5 bg-white rounded">
                                    <div class="profile-widget-header">
                                        @if (is_null($pasFoto))
                                            <img alt="image" src="{{ asset('img/no_image.jpg') }}" height="110"
                                                class="rounded-circle profile-widget-picture">
                                        @else
                                            <img alt="image" src="{{ asset('img/berkas_dokter/' . $pasFoto) }}" height="110"
                                                class="rounded-circle profile-widget-picture">
                                        @endif
                                        <div class="profile-widget-items">
                                            <div class="profile-widget-item">
                                                <div class="profile-widget-item-label">Status</div>
                                                <div class="profile-widget-item-value">Dummy</div>
                                            </div>
                                            <div class="profile-widget-item">
                                                <div class="profile-widget-item-label">Priode Aktif</div>
                                                @if (is_null($value->masa_aktif))
                                                    <div class="profile-widget-item-value">-</div>
                                                @else
                                                    <div class="profile-widget-item-value">
                                                        {{ date('d-M-Y', strtotime($value->masa_aktif)) }}</div>
                                                @endif
                                            </div>
                                            <div class="profile-widget-item">
                                                <div class="profile-widget-item-label">Keanggotaan</div>
                                                @if (is_null($value->domisili_anggota))
                                                    <div class="profile-widget-item-value">-</div>
                                                @else
                                                    <div class="profile-widget-item-value">{{ $value->domisili_anggota }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-widget-description pb-0">
                                        <div class="profile-widget-name">
                                            <h5><u>{{ $value->nama_lengkap }},</u></h5>
                                        </div>
                                        <table class="table">
                                            <tr>
                                                <td>Nama Panggilan</td>
                                                <td>:</td>
                                                @if (is_null($value->nama_panggilan))
                                                    <td>-</td>
                                                @else
                                                    <td>{{ $value->nama_panggilan }}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>:</td>
                                                @if (is_null($value->jenis_kelamin))
                                                    <td>-</td>
                                                @else
                                                    <td>{{ $value->jenis_kelamin }}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Tempat Lahir</td>
                                                <td>:</td>
                                                @if (is_null($value->tempat_lahir))
                                                    <td>-</td>
                                                @else
                                                    <td>{{ $value->tempat_lahir }}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Tanggal Lahir</td>
                                                <td>:</td>
                                                @if (is_null($value->tanggal_lahir))
                                                    <td>-</td>
                                                @else
                                                    <td>{{ date('d-M-Y', strtotime($value->tanggal_lahir)) }}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Alumni</td>
                                                <td>:</td>
                                                @if (is_null($value->alumni))
                                                    <td>-</td>
                                                @else
                                                    <td>{{ $value->alumni }}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Tahun Alumni</td>
                                                <td>:</td>
                                                @if (is_null($value->tahun_alumni))
                                                    <td>-</td>
                                                @else
                                                    <td>{{ $value->tahun_alumni }}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Nama Pasangan</td>
                                                <td>:</td>
                                                @if (is_null($value->nama_pasangan))
                                                    <td>-</td>
                                                @else
                                                    <td>{{ $value->nama_pasangan }}</td>
                                                @endif

                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                @if (is_null($value->nama_panggilan))
                                                    <td>-</td>
                                                @else
                                                    <td>{{ $value->alamat_rumah }}</td>
                                                @endif
                                            </tr>
                                        </table>

                                    </div>
                                    <div class="card-footer text-center pt-0">
                                        <div class="font-weight-bold mb-2 text-small">Biodata Dokter</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-5 mt-4 pt-2">
                                <div class="card card-primary pt-4 shadow p-3 mb-5 bg-white rounded">
                                    <table class="table">
                                        <tr>
                                            <td>No. Telp / HP</td>
                                            <td>:</td>
                                            @if (is_null($value->no_telp))
                                                <td>-</td>
                                            @else
                                                <td>{{ $value->no_telp }}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            @if (is_null($value->email))
                                                <td>-</td>
                                            @else
                                                <td>{{ $value->email }}</td>
                                            @endif
                                        </tr>
                                    </table>
                                    <div class="card-footer text-center pt-0">
                                        <div class="font-weight-bold mb-2 text-small">Kontak Dokter</div>
                                    </div>
                                </div>
                                <div class="card card-primary pt-4 shadow p-3 mb-5 bg-white rounded">
                                    <table class="table">
                                        <tr>
                                            <td>Bidang Kerja Veteriner</td>
                                            <td>:</td>
                                            @if (is_null($value->bidang_kerja))
                                                <td>-</td>
                                            @else
                                                <td>{{ $value->bidang_kerja }}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Nama Klinik</td>
                                            <td>:</td>
                                            @if (is_null($value->nama_klinik))
                                                <td>-</td>
                                            @else
                                                <td>{{ $value->nama_klinik }}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Alamat Klinik</td>
                                            <td>:</td>
                                            @if (is_null($value->alamat_klinik))
                                                <td>-</td>
                                            @else
                                                <td>{{ $value->alamat_klinik }}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>No. Telp / Fax Klinik</td>
                                            <td>:</td>
                                            @if (is_null($value->no_telp_klinik))
                                                <td>-</td>
                                            @else
                                                <td>{{ $value->no_telp_klinik }}</td>
                                            @endif
                                        </tr>
                                    </table>
                                    <div class="card-footer text-center pt-0">
                                        <div class="font-weight-bold mb-2 text-small">Info Profesi</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <a class="btn btn-primary mr-4 mb-3" href="/adminDokter" role="button">Kembali</a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="section-footer">

            </div>
        </section>
    </div>
@endsection
