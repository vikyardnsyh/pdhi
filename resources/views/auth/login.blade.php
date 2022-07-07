<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login PDHI Banten II</title>
    <link rel="shortcut icon" href="{{ asset('img/pdhi_logo_transparent.png') }}">
    <meta http-equiv="refresh" content="61">
    <script>
        function showhide() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('common/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('stisla/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/css/components.css') }}">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3 mt-n2">
                        <img src="{{ asset('img/pdhi_logo.jpg') }}" alt="logo" width="60"
                            class="shadow-lg bg-white rounded-circle mb-2 mt-2">
                        <h4 class="text-dark font-weight-normal">Selamat datang, di <span class="font-weight-bold">PDHI
                                Banten II</span></h4>
                        <div class="text-muted">Silahkan login terlebih dahulu, atau ajukan akun anda jika belum memiliki
                            akun PDHI Banten II dengan link yang tersedia dibawah</div>

                        @if (session('gagal_login'))
                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    {{ session('gagal_login') }}
                                </div>
                            </div>
                        @endif

                        <form method="POST" action="{{ url('/login') }}" class="needs-validation" novalidate="">
                            @csrf
                            <div class="form-group mt-2">
                                <label for="username">Username</label>
                                <input id="username" type="username" class="form-control" name="username" tabindex="1"
                                    required autofocus>
                                <div class="invalid-feedback">
                                    Mohon isi username akun anda
                                </div>
                            </div>
                            <div class="form-group mt-n2">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control" name="password"
                                        tabindex="2" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" onclick="showhide()"
                                            data-toggle="tooltip" data-placement="top" title
                                            data-original-title="Lihat / Sembunyikan Password"><i class="fa fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="invalid-feedback">
                                        Mohon isi password akun anda
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-n4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                        id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember-me">Ingat akun saya</label>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="float-left mt-3">
                                        {{ __('Lupa Password?') }}
                                    </a>
                                @endif

                                <button type="submit" class="btn btn-primary btn-icon icon-right mt-n4" tabindex="4">
                                    Login
                                </button>
                            </div>

                            <div class="mt-5 text-center mt-n1 pr-1">
                                Belum memiliki akun? <a href="{{ route('pengajuanAkun') }}">Ajukan akun</a>
                            </div>
                        </form>
                        <div class="text-center mt-3 text-small">
                            Copyright &copy; PDHI Banten II <br>
                            Oleh <div class="bullet"></div> Viky Ardiansyah
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-x position-relative"
                    data-background="{{ asset('img/pets.jpg') }}">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2 mt-2">
                            <div class="mb-1 pb-1">
                                <h1 class="mb-2 display-4 font-weight-bold" style="text-shadow: 2px 2px 3px #424ea5">
                                    {{ ucapan(date_default_timezone_set('Asia/Bangkok')) }}
                                </h1>
                                <h2 class="font-weight-normal text-light-transparent" style="text-shadow: 2px 2px 2px #424ea5">
                                    {{ tanggal() }}
                                </h2>
                                <h4 class="font-weight-normal text-light-transparent" style="text-shadow: 2px 2px 2px #424ea5">
                                    {{ jam() }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('common/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('common/js/popper.min.js') }}"></script>
    <script src="{{ asset('common/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('common/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('common/js/moment.min.js') }}"></script>
    <script src="{{ asset('stisla/js/stisla.js') }}"></script>

    <!-- JS Libraies -->


    <!-- Template JS File -->
    <script src="{{ asset('stisla/js/scripts.js') }}"></script>
    <script src="{{ asset('stisla/js/custom.js') }}"></script>

</body>

</html>
