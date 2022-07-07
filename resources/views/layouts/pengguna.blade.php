<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('img/pdhi_logo_transparent.png') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('common/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> --}}

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('stisla/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('common/css/bootstrap-datepicker3.css') }}">


</head>

<body>
    @section('sidebar')
        <div id="app">
            <div class="main-wrapper">
                <div class="navbar-bg"></div>
                <nav class="navbar navbar-expand-lg main-navbar">
                    <form class="form-inline mr-auto">
                        <ul class="navbar-nav mr-3">
                            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                        class="fas fa-bars"></i></a></li>
                            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                        class="fas fa-search"></i></a></li>
                        </ul>

                    </form>
                    <ul class="navbar-nav navbar-right">
                        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-sm-none d-lg-inline-block">Selamat Datang Dokter, {{ $NamaDokter }}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-title">Logged in 5 min ago</div>
                                <a href="features-profile.html" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> Profile
                                </a>
                                <a href="features-activities.html" class="dropdown-item has-icon">
                                    <i class="fas fa-bolt"></i> Activities
                                </a>
                                <a href="features-settings.html" class="dropdown-item has-icon">
                                    <i class="fas fa-cog"></i> Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="main-sidebar">
                    <aside id="sidebar-wrapper">
                        <div class="sidebar-brand">
                            <a href="#"><img src="{{ asset('img/pdhi_logo.jpg') }}" alt="logo" width="60"
                                    class="shadow p-1 bg-white rounded-circle mb-2 mt-2"></a>
                            <p class="font-weight-bold">PDHI Banten II</p>
                        </div>
                        <ul class="sidebar-menu">
                            <li class="menu-header">Beranda</li>
                            <li><a class="nav-link" href="/"><i class="fa fa-home mr-2"></i>
                                    <span>Home</span></a></li>
                            <li class="menu-header">Keanggotaan</li>
                            <li><a class="nav-link" href="/formRegistrasi"><i class="fa fa-address-card mr-2"></i>
                                    <span>Form Registrasi Anggota</span></a></li>
                            <li><a class="nav-link" href="/uploadBerkas"><i class="fa fa-upload mr-2"></i>
                                    <span>Upload Berkas</span></a></li>
                            <li class="menu-header">Info</li>
                            <li><a href="/syaratPendaftaran" class="nav-link" href="/"><i
                                        class="fa fa-info-circle mr-2"></i> <span>Syarat
                                        Pendaftaran Anggota</span></a></li>
                            <div class="mt-5 mb-5 p-3 hide-sidebar-mini">
                                <a href="/logout" class="btn btn-primary btn-lg btn-block btn-icon-split">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </div>
                        </ul>
                    </aside>
                </div>

                @yield('content')
                <footer class="main-footer">
                    <div class="footer-left">
                        Copyright &copy; 2022 <div class="bullet"></div> PDHI Banten II
                    </div>
                    <div class="footer-right">
                        1.0
                    </div>
                </footer>
            </div>
        </div>

        <!-- General JS Scripts -->
        <script src="{{ asset('common/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('common/js/popper.min.js') }}"></script>
        <script src="{{ asset('common/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('common/js/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('common/js/moment.min.js') }}"></script>
        <script src="{{ asset('common/js/bootstrap-datepicker.min.js') }}"></script>

        <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
        <script src="{{ asset('stisla/js/stisla.js') }}"></script>

        <!-- Template JS File -->
        <script src="{{ asset('stisla/js/scripts.js') }}"></script>
        <script src="{{ asset('stisla/js/custom.js') }}"></script>

        @include('sweetalert::alert')
    </body>

    </html>
