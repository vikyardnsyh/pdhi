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
    <link rel="stylesheet" href="{{ asset('common/css/bootstrap-datepicker3.css') }}?v={{ filemtime(public_path('common/css/bootstrap-datepicker3.css')) }}">
    <link rel="stylesheet" href="{{ asset('stisla/css/custom.css') }}?v={{ filemtime(public_path('stisla/css/custom.css')) }}">
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
    </script>
    <style>
        .vl {
            border-left: 6px solid white;
            height: 29px;
        }
    </style>

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
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"><i class="fa fa-user-circle fa-2x"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Hallo Admin,<br>{{ $NamaAdmin }}</div>
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
                        <a href="/"><img src="{{ asset('img/pdhi_logo.jpg') }}" alt="logo" width="60" class="shadow p-1 bg-white rounded-circle mb-2 mt-2"></a>
                        <p class="font-weight-bold">PDHI Banten II</p>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Beranda</li>
                        <li class="{{ Request::is('/') ? 'active' : '' }}"><a class="nav-link" href="/"><i class="fa fa-briefcase mr-2"></i>
                                <span>Dashboard</span></a></li>
                        <li class="menu-header">Administrasi Data</li>
                        <li class="{{ Request::is('AdminAkun*') ? 'active' : '' }}"><a class="nav-link" href="/AdminAkun"><i class="fa fa-key mr-2"></i>
                                <span>Administrasi Data Akun</span></a></li>
                        <li class="{{ Request::is('adminDokter*') ? 'active' : '' }}"><a class="nav-link" href="/adminDokter"><i class="fa fa-folder-open mr-2"></i>
                                <span>Administrasi Data Dokter</span></a></li>
                        <li class="menu-header">Administrasi Keanggotaan</li>
                        <li class="{{ Request::is('adminPendaftaran*') ? 'active' : '' }}"><a class="nav-link" href="/adminPendaftaran"><i class="fa fa-address-book mr-2"></i>
                                <span>Administrasi Pendaftaran</span></a></li>
                        <li class="{{ Request::is('adminKeanggotaan*') ? 'active' : '' }}"><a class="nav-link" href="/adminKeanggotaan"><i class="fa fa-user-circle mr-2"></i>
                                <span>Administrasi Anggota</span></a></li>
                        <li class="menu-header">Laporan</li>
                        <li class="{{ Request::is('adminLaporan*') ? 'active' : '' }}"><a class="nav-link" href="/adminLaporan"><i class="fa fa-book mr-2"></i> <span>Download
                                    Laporan</span></a></li>
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
    <script src="{{ asset('common/js/sweetalert.min.js') }}"></script>

    <script type="text/javascript">
        $('.show-alert-delete-confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Hapus Akun Ini?",
                text: "Seluruh data terkait akun yang dipilih akan dihapus",
                icon: "warning",
                type: "warning",
                buttons: ["Batal", "Hapus"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>

    <script type="text/javascript">
        $('.show-alert-password-confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Reset Password Akun Ini?",
                text: "Password Akan Diubah Menjadi : PdhiBanten2!",
                icon: "info",
                type: "info",
                buttons: ["Batal", "Reset"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>

    @include('sweetalert::alert')
</body>

</html>