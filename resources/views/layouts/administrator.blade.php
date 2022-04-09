<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('img/pdhi_logo_transparent.png') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('stisla/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/css/components.css') }}">

    {{-- <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../node_modules/weathericons/css/weather-icons.min.css">
  <link rel="stylesheet" href="../node_modules/weathericons/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css"> --}}

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
                                <div class="d-sm-none d-lg-inline-block">Hallo Admin, {{ $NamaAdmin }}</div>
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
                                    class="shadow-lg bg-white rounded-circle mb-2 mt-2"></a>
                            <p class="font-weight-bold">PDHI Banten II</p>
                        </div>
                        <ul class="sidebar-menu">
                            <li class="menu-header">Beranda</li>
                            <li><a class="nav-link" href="/"><i class="fa fa-briefcase"></i>
                                    <span>Dashboard</span></a></li>
                            <li class="menu-header">Administrasi Anggota</li>
                            <li><a class="nav-link" href="/AdminAkun"><i class="fa fa-user-circle"></i>
                                    <span>Administrasi Akun</span></a></li>
                            <li><a class="nav-link" href="/adminDokter"><i class="fa fa-address-card"></i>
                                    <span>Administrasi Dokter</span></a></li>
                            <li><a class="nav-link" href="/"><i class="fa fa-address-book"></i> <span>Administrasi
                                        Keanggotaan</span></a></li>
                            <li class="menu-header">Berkas</li>
                            <li><a class="nav-link" href="/adminBerkas"><i class="fa fa-folder-open"></i> <span>Berkas
                                        Anggota</span></a></li>
                            <li class="menu-header">Laporan</li>
                            <li><a class="nav-link" href="/"><i class="fa fa-book"></i> <span>Download
                                        Laporan</span></a></li>
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
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

        <script src="{{ asset('stisla/js/stisla.js') }}"></script>

        <!-- Template JS File -->
        <script src="{{ asset('stisla/js/scripts.js') }}"></script>
        <script src="{{ asset('stisla/js/custom.js') }}"></script>


        {{-- <!-- JS Libraies -->
  <script src="../node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
  <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="../node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="../node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script> --}}

        {{-- <!-- Page Specific JS File -->
  <script src="../assets/js/page/index-0.js"></script> --}}
        @include('sweetalert::alert')
    </body>

    </html>
