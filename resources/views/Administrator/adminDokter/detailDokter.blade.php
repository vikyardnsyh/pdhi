@extends('layouts.administrator')
@section('title', 'Detail Dokter')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Detail Profil Dokter</h1>
                <small class="text-muted">Informasi lengkap biodata, kontak, dan profesi dokter</small>
            </div>
        </div>

        <div class="section-body">
            @foreach ($DataDokter as $key => $value)
            <div class="row">
                {{-- Profile & Biodata Column --}}
                <div class="col-12 col-lg-7 mb-4">
                    <div class="card profile-widget card-primary shadow-sm h-100">
                        <div class="profile-widget-header">
                            <img alt="Foto Dokter" src="{{ !empty($pasFoto) ? asset('img/berkas_dokter/' . $pasFoto) : asset('img/no_image.jpg') }}" height="110" width="110" class="rounded-circle profile-widget-picture object-fit-cover shadow-sm">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Status</div>
                                    <div class="profile-widget-item-value">
                                        @php
                                        date_default_timezone_set('Asia/Jakarta');
                                        $now = new DateTime(date('Y-m-d'));
                                        $expired = !empty($value->masa_aktif) ? new DateTime($value->masa_aktif) : null;
                                        if (is_null($expired)) {
                                            $status = '<span class="badge badge-danger">Belum Terdaftar</span>';
                                        } else {
                                            $status = ($now > $expired)
                                                ? '<span class="badge badge-secondary">Non Aktif</span>'
                                                : '<span class="badge badge-success">Aktif</span>';
                                        }
                                        @endphp
                                        {!! $status !!}
                                    </div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Masa Aktif</div>
                                    <div class="profile-widget-item-value">
                                        {{ !empty($value->masa_aktif) ? date('d-M-Y', strtotime($value->masa_aktif)) : '-' }}
                                    </div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Keanggotaan</div>
                                    <div class="profile-widget-item-value text-capitalize">
                                        {{ $value->domisili_anggota ?? '-' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="profile-widget-description pb-2">
                            <div class="profile-widget-name mb-3">
                                <h5 class="text-primary font-weight-bold mb-1">{{ $value->nama_lengkap }}</h5>
                                <span class="text-muted text-small"><i class="fas fa-user-tag mr-1"></i> Username: <strong>{{ $value->username }}</strong></span>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-sm table-striped">
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-600" width="35%">Nama Panggilan</td>
                                            <td width="5%">:</td>
                                            <td>{{ $value->nama_panggilan ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-600">Jenis Kelamin</td>
                                            <td>:</td>
                                            <td>{{ $value->jenis_kelamin ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-600">Tempat, Tgl Lahir</td>
                                            <td>:</td>
                                            <td>{{ $value->tempat_lahir ?? '-' }}, {{ !empty($value->tanggal_lahir) ? date('d-M-Y', strtotime($value->tanggal_lahir)) : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-600">Alumni Kampus</td>
                                            <td>:</td>
                                            <td>{{ $value->alumni ?? '-' }} (Tahun {{ $value->tahun_alumni ?? '-' }})</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-600">Nama Pasangan</td>
                                            <td>:</td>
                                            <td>{{ $value->nama_pasangan ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-600">Alamat Rumah</td>
                                            <td>:</td>
                                            <td>{{ $value->alamat_rumah ?? '-' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contact & Clinic Information Column --}}
                <div class="col-12 col-lg-5 mb-4">
                    {{-- Kontak --}}
                    <div class="card card-primary shadow-sm mb-3">
                        <div class="card-header py-3">
                            <h4 class="text-dark font-weight-bold"><i class="fas fa-address-book text-primary mr-2"></i> Kontak Dokter</h4>
                        </div>
                        <div class="card-body py-2">
                            <table class="table table-sm mb-0">
                                <tr>
                                    <td class="font-weight-600" width="35%">No. Telp / HP</td>
                                    <td width="5%">:</td>
                                    <td>
                                        @if(!empty($value->no_telp))
                                            <a href="tel:{{ $value->no_telp }}">{{ $value->no_telp }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-600">Email</td>
                                    <td>:</td>
                                    <td>
                                        @if(!empty($value->email))
                                            <a href="mailto:{{ $value->email }}">{{ $value->email }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    {{-- Info Klinik & Profesi --}}
                    <div class="card card-primary shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="text-dark font-weight-bold"><i class="fas fa-clinic-medical text-primary mr-2"></i> Info Tempat Kerja</h4>
                        </div>
                        <div class="card-body py-2">
                            <table class="table table-sm mb-0">
                                <tr>
                                    <td class="font-weight-600" width="35%">Bidang Kerja</td>
                                    <td width="5%">:</td>
                                    <td>{{ $value->bidang_kerja ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-600">Nama Tempat</td>
                                    <td width="5%">:</td>
                                    <td>{{ $value->nama_klinik ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-600">Alamat Tempat</td>
                                    <td width="5%">:</td>
                                    <td>{{ $value->alamat_klinik ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-600">No. Telp/Fax</td>
                                    <td width="5%">:</td>
                                    <td>{{ $value->no_telp_klinik ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-right mt-2 mb-4">
                    <a href="{{ url('/adminDokter') }}" class="btn btn-primary px-4 shadow-sm font-weight-600">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali ke Daftar Dokter
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
