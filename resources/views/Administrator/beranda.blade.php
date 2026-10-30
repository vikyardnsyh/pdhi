@extends('layouts.administrator')
@section('title', 'Dashboard Administrator')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Dashboard</h1>
                <small class="text-muted">Ringkasan Statistik & Data PDHI Banten II</small>
            </div>
        </div>

        {{-- Overview Cards: Total Anggota vs Non-Anggota --}}
        <div class="row mb-3">
            <div class="col-12 col-md-6 mb-3">
                <div class="card border-0 shadow-sm" style="border-left: 5px solid var(--pdhi-success) !important;">
                    <div class="card-body p-4 d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-uppercase text-muted font-weight-bold text-small">Total Anggota Terdaftar</span>
                            <h2 class="text-success font-weight-bold mb-0 mt-1">{{ $totalAnggota }}</h2>
                            <small class="text-muted">Dokter dengan status keanggotaan terverifikasi</small>
                        </div>
                        <div class="bg-success text-white rounded-circle p-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 55px; height: 55px;">
                            <i class="fas fa-user-check fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <div class="card border-0 shadow-sm" style="border-left: 5px solid var(--pdhi-danger) !important;">
                    <div class="card-body p-4 d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-uppercase text-muted font-weight-bold text-small">Total Belum Terdaftar</span>
                            <h2 class="text-danger font-weight-bold mb-0 mt-1">{{ $totalNonAnggota }}</h2>
                            <small class="text-muted">Dokter belum diverifikasi atau belum melengkapi berkas</small>
                        </div>
                        <div class="bg-danger text-white rounded-circle p-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 55px; height: 55px;">
                            <i class="fas fa-user-clock fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Detail Statistics Grid --}}
        <div class="row">
            {{-- Akun Admin --}}
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 shadow-sm">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-user-shield fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Akun Administrator</h4>
                        </div>
                        <div class="card-body">
                            {{ $akunAdmin }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Akun User --}}
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 shadow-sm">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Akun Dokter User</h4>
                        </div>
                        <div class="card-body">
                            {{ $akunUser }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Anggota Tetap --}}
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 shadow-sm">
                    <div class="card-icon bg-warning text-white">
                        <i class="fas fa-id-card fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Anggota Tetap</h4>
                        </div>
                        <div class="card-body">
                            {{ $anggotaTetap }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Anggota Tamu --}}
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 shadow-sm">
                    <div class="card-icon bg-warning text-white">
                        <i class="fas fa-address-card fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Anggota Tamu</h4>
                        </div>
                        <div class="card-body">
                            {{ $anggotaTamu }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Anggota Aktif --}}
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 shadow-sm">
                    <div class="card-icon bg-success text-white">
                        <i class="fas fa-check-circle fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Anggota Masa Aktif</h4>
                        </div>
                        <div class="card-body">
                            {{ $anggotaAktif }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Anggota Non-Aktif --}}
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 shadow-sm">
                    <div class="card-icon bg-danger text-white">
                        <i class="fas fa-times-circle fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Anggota Kadaluarsa</h4>
                        </div>
                        <div class="card-body">
                            {{ $anggotaNonAktif }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
