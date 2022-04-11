@extends('layouts.pengguna')
@section('title', 'Beranda')
@section('sidebar')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Beranda Dokter Status(Terdaftar, Belum Terdaftar, Perpanjangan)(Tabel kelengkapan berkas)</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-6">
                            <div class="card profile-widget card-primary">
                                <div class="profile-widget-header">
                                    <img alt="image" src="{{ asset('img/dokter.jpg') }}"
                                        class="rounded-circle profile-widget-picture">
                                    <div class="profile-widget-items">
                                        <div class="profile-widget-item">
                                            <div class="profile-widget-item-label">Status</div>
                                            <div class="profile-widget-item-value">Perpanjang Keanggotaan</div>
                                        </div>
                                        <div class="profile-widget-item">
                                            <div class="profile-widget-item-label">Priode Aktif</div>
                                            <div class="profile-widget-item-value">02/08/2024</div>
                                        </div>
                                        <div class="profile-widget-item">
                                            <div class="profile-widget-item-label">Keanggotaan</div>
                                            <div class="profile-widget-item-value">Tetap</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-widget-description pb-0">
                                    <div class="profile-widget-name">{{ $NamaDokter }}
                                        <div class="text-muted d-inline font-weight-normal">
                                            <div class="slash">
                                            </div> Drh.
                                        </div>
                                    </div>
                                    <table class="table">
                                        <tr>
                                            <td>Nama Panggilan</td>
                                            <td>:</td>
                                            <td>aaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                                        </tr>
                                        <tr>
                                            <td>Tempat Lahir</td>
                                            <td>:</td>
                                            <td>aaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Lahir</td>
                                            <td>:</td>
                                            <td>aaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                                        </tr>
                                        <tr>
                                            <td>Alumni</td>
                                            <td>:</td>
                                            <td>aaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Alumni</td>
                                            <td>:</td>
                                            <td>aaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                                        </tr>                                  
                                        <tr>
                                            <td>Nama Pasangan</td>
                                            <td>:</td>
                                            <td>aaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td>aaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                                        </tr>
                                    </table>

                                </div>
                                <div class="card-footer text-center pt-0">
                                    <div class="font-weight-bold mb-2 text-small">Biodata Dokter</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-6 mt-4 pt-2">
                            <div class="card card-primary pt-4">
                                <table class="table">
                                    <tr>
                                        <td>No. Telp / HP</td>
                                        <td>:</td>
                                        <td>aaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>aaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                                    </tr>
                                </table>
                                <div class="card-footer text-center pt-0">
                                    <div class="font-weight-bold mb-2 text-small">Kontak Dokter</div>
                                    </a>
                                </div>
                            </div>
                            <div class="card card-primary pt-4">
                                <table class="table">
                                    <tr>
                                        <td>Bidang Kerja Veteriner</td>
                                        <td>:</td>
                                        <td>aaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Klinik</td>
                                        <td>:</td>
                                        <td>aaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Klinik</td>
                                        <td>:</td>
                                        <td>aaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                                    </tr>
                                    <tr>
                                        <td>Email Klinik</td>
                                        <td>:</td>
                                        <td>aaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                                    </tr>
                                    <tr>
                                        <td>No. Telp / Fax Klinik</td>
                                        <td>:</td>
                                        <td>aaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                                    </tr>
                                </table>
                                <div class="card-footer text-center pt-0">
                                    <div class="font-weight-bold mb-2 text-small">Klinik Dokter</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection
