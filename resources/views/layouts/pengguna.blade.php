<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>
        <script>
        function togglePasswordVisibility(button) {
            if (!button) return;
            var now = Date.now();
            if (button._lastToggleTime && (now - button._lastToggleTime) < 250) return;
            button._lastToggleTime = now;

            var targetSelector = button.getAttribute('data-target') || '#password';
            var input = document.querySelector(targetSelector);
            if (!input) return;

            var willShowText = (input.type === 'password');
            input.type = willShowText ? 'text' : 'password';

            var icon = button.querySelector('i, svg');
            if (icon) {
                if (icon.tagName.toLowerCase() === 'svg') {
                    var newI = document.createElement('i');
                    newI.className = willShowText ? 'fas fa-eye-slash' : 'fas fa-eye';
                    icon.parentNode.replaceChild(newI, icon);
                    if (window.FontAwesome && window.FontAwesome.dom && window.FontAwesome.dom.i2svg) {
                        window.FontAwesome.dom.i2svg({ node: button });
                    }
                } else {
                    if (willShowText) {
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                }
            }
        }
        window.togglePasswordVisibility = togglePasswordVisibility;

        function showhide() {
            var btn = document.querySelector('[data-target="#password"]');
            if (btn) { togglePasswordVisibility(btn); }
            else {
                var x = document.getElementById("password");
                if (x) x.type = (x.type === "password") ? "text" : "password";
            }
        }
        function showhide2() {
            var btn = document.querySelector('[data-target="#password2"]');
            if (btn) { togglePasswordVisibility(btn); }
            else {
                var y = document.getElementById("password2");
                if (y) y.type = (y.type === "password") ? "text" : "password";
            }
        }
        function showhide22() {
            var btn = document.querySelector('[data-target="#konfirmasi_password_baru"]');
            if (btn) { togglePasswordVisibility(btn); }
            else {
                var y = document.getElementById("konfirmasi_password_baru");
                if (y) y.type = (y.type === "password") ? "text" : "password";
            }
        }
    </script>
    <link rel="shortcut icon" href="{{ asset('img/pdhi_logo_transparent.png') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('common/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> --}}

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('stisla/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('common/css/bootstrap-datepicker3.css') }}?v={{ filemtime(public_path('common/css/bootstrap-datepicker3.css')) }}">
    <link rel="stylesheet" href="{{ asset('stisla/css/custom.css') }}?v={{ filemtime(public_path('stisla/css/custom.css')) }}">


</head>

<body>
    @section('sidebar')
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars fa-2x"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <i class="fa fa-user-circle fa-2x"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Hallo Dokter,<br>{{ $NamaDokter }}</div>
                            <a href="/logout" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="#"><img src="{{ asset('img/pdhi_logo.jpg') }}" alt="logo" width="60" class="shadow p-1 bg-white rounded-circle mb-2 mt-2"></a>
                        <p class="font-weight-bold">PDHI Banten II</p>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Beranda</li>
                        <li class="{{ Request::is('/') ? 'active' : '' }}"><a class="nav-link" href="/"><i class="fa fa-home mr-2"></i>
                                <span>Home</span></a></li>
                        <li class="menu-header">Keanggotaan</li>
                        <li class="{{ Request::is('formRegistrasi*') ? 'active' : '' }}"><a class="nav-link" href="/formRegistrasi"><i class="fa fa-address-card mr-2"></i>
                                <span>Form Registrasi Anggota</span></a></li>
                        <li class="{{ Request::is('uploadBerkas*') ? 'active' : '' }}"><a class="nav-link" href="/uploadBerkas"><i class="fa fa-upload mr-2"></i>
                                <span>Upload Berkas</span></a></li>
                        <li class="menu-header">Info</li>
                        <li class="{{ Request::is('syaratPendaftaran*') ? 'active' : '' }}"><a href="/syaratPendaftaran" class="nav-link"><i class="fa fa-info-circle mr-2"></i> <span>Syarat
                                    Pendaftaran Anggota</span></a></li>
                        <li class="menu-header">Akun</li>
                        <li class="{{ Request::is('ubahPassword*') ? 'active' : '' }}"><a href="/ubahPassword" class="nav-link"><i class="fa fa-key mr-2"></i> <span>Ubah Password</span></a></li>
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
    <script src="{{ asset('common/js/bootstrap-datepicker.min.js') }}?v={{ filemtime(public_path('common/js/bootstrap-datepicker.min.js')) }}"></script>

    <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('stisla/js/stisla.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('stisla/js/scripts.js') }}"></script>
    <script src="{{ asset('stisla/js/custom.js') }}?v={{ filemtime(public_path('stisla/js/custom.js')) }}"></script>

    @include('sweetalert::alert')
</body>

</html>