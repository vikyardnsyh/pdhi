@extends('layouts.pengguna')
@section('title', 'Beranda Dokter')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Beranda Dokter</h1>
                <small class="text-muted">Status Keanggotaan & Data Profil Anda</small>
            </div>
        </div>

        <div class="section-body">
            @foreach ($DataDokter as $key => $value)
            <div class="row">
                {{-- Profile & Biodata Column --}}
                <div class="col-12 col-lg-7 mb-4">
                    <div class="card profile-widget card-primary shadow-sm">
                        <div class="profile-widget-header">
                            <img alt="Foto Profil" src="{{ !empty($pasFoto) ? asset('img/berkas_dokter/' . $pasFoto) : asset('img/no_image.jpg') }}" height="110" width="110" class="rounded-circle profile-widget-picture object-fit-cover shadow-sm">
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
                                <span class="text-muted text-small"><i class="fas fa-id-badge mr-1"></i> Anggota PDHI Cabang Banten II</span>
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

                            <div class="mt-3 pt-3 border-top d-flex justify-content-end">
                                <a href="{{ url('/formRegistrasi') }}" class="btn btn-primary shadow-sm font-weight-600">
                                    <i class="fas fa-user-edit mr-1"></i> Perbarui Biodata
                                </a>
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
                                    <td>:</td>
                                    <td>{{ $value->nama_klinik ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-600">Alamat Tempat</td>
                                    <td>:</td>
                                    <td>{{ $value->alamat_klinik ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-600">No. Telp/Fax</td>
                                    <td>:</td>
                                    <td>{{ $value->no_telp_klinik ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kelengkapan Berkas (Modern Responsive Card & Grid) --}}
            @php
            $kelengkapanBerkas = [
                'Pas Foto'               => ['file' => $pasFoto,       'icon' => 'fa-portrait'],
                'Ijazah drh.'            => ['file' => $ijazah,        'icon' => 'fa-graduation-cap'],
                'KTP'                    => ['file' => $ktp,           'icon' => 'fa-id-card'],
                'KTA'                    => ['file' => $kta,           'icon' => 'fa-address-card'],
                'STRV'                   => ['file' => $strv,          'icon' => 'fa-certificate'],
                'SKDHI'                  => ['file' => $skdhi,         'icon' => 'fa-file-signature'],
                'Bukti Tf. Pendaftaran'  => ['file' => $tf_daftar,     'icon' => 'fa-receipt'],
                'Bukti Tf. Keanggotaan'  => ['file' => $tf_registrasi, 'icon' => 'fa-money-check-alt'],
            ];
            @endphp

            <div class="card card-primary shadow-sm mb-4">
                <div class="card-header d-flex justify-content-between align-items-center py-3">
                    <h4 class="text-dark font-weight-bold mb-0">
                        <i class="fas fa-clipboard-check text-primary mr-2"></i> Checklist Kelengkapan Berkas
                    </h4>
                    <a href="{{ url('/uploadBerkas') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-upload mr-1"></i> Kelola Berkas
                    </a>
                </div>
                <div class="card-body">
                    {{-- Mobile Responsive Card Grid --}}
                    <div class="row">
                        @foreach ($kelengkapanBerkas as $label => $item)
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="doc-checklist-card p-3 border rounded h-100 d-flex flex-column justify-content-between {{ !empty($item['file']) ? 'border-success' : 'border-danger' }}">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas {{ $item['icon'] }} mr-2 text-muted"></i>
                                    <span class="font-weight-600 text-small text-dark">{{ $label }}</span>
                                </div>
                                <div class="text-right mt-2">
                                    @if (!empty($item['file']))
                                        <span class="badge badge-success"><i class="fas fa-check mr-1"></i> Terunggah</span>
                                    @else
                                        <span class="badge badge-danger"><i class="fas fa-times mr-1"></i> Belum Ada</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
