@extends('layouts.administrator')
@section('title', 'Dashboard')
@section('sidebar')
@endsection

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fa fa-key fa-2x" style="color:white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Akun Admin</h4>
                            </div>
                            <div class="card-body">
                                {{ $akunAdmin }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fa fa-user fa-2x" style="color:white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Akun User</h4>
                            </div>
                            <div class="card-body">
                                {{ $akunUser }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fa fa-address-book fa-2x" style="color:white"></i>
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
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fa fa-address-card fa-2x" style="color:white"></i>
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
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fa fa-check-circle fa-2x" style="color:white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Anggota Aktif</h4>
                            </div>
                            <div class="card-body">
                                {{ $anggotaAktif }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fa fa-minus-circle fa-2x" style="color:white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Anggota Non-Aktif</h4>
                            </div>
                            <div class="card-body">
                                {{ $anggotaNonAktif }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-3 col-sm-3 col-1">
                    <div class="card card-statistic-4">
                        <div class="card-icon bg-primary">
                            <h5 align='center' class="mt-1 text-white">Total Anggota</h5>
                        </div>
                        <div class="card-wrap">
                            <div class="card-body mb-n3">
                                <h2 align='center' class="text-dark mt-n2">{{ $totalAnggota }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
