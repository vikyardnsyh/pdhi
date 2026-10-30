<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login - PDHI Banten II</title>
    <link rel="shortcut icon" href="{{ asset('img/pdhi_logo_transparent.png') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('common/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('stisla/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/css/components.css') }}">
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
</head>

<body class="bg-light auth-login-page">
    <div id="app">
        <section class="section">
            <div class="container py-2 py-md-3">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 position-relative">
                        <div class="login-brand text-center my-2">
                            <img src="{{ asset('img/pdhi_logo.jpg') }}" alt="logo" width="68" height="68" class="shadow-sm rounded-circle mb-2 bg-white p-1">
                            <h5 class="mb-0 font-weight-bold text-dark">PDHI Cabang Banten II</h5>
                            <span class="text-muted text-small d-block">Sistem Administrasi Anggota</span>
                        </div>

                        <div class="login-card-wrapper position-relative">
                            <div id="login-puppy-peek" class="login-mascot login-mascot-left d-none d-lg-block" aria-hidden="true">
                                <div class="puppy-img-container">
                                    <img class="puppy-img puppy-img-stand" src="{{ asset('img/puppy_stand.gif') }}?v={{ filemtime(public_path('img/puppy_stand.gif')) }}" alt="Puppy Standing" width="220" height="260">
                                    <img class="puppy-img puppy-img-jump" src="{{ asset('img/puppy_jump.gif') }}?v={{ filemtime(public_path('img/puppy_jump.gif')) }}" alt="Puppy Jumping" width="220" height="260">
                                </div>
                            </div>

                            <div id="login-cat-reach" class="login-mascot login-mascot-right d-none d-lg-block" aria-hidden="true">
                                <svg class="cat-arm-svg" viewBox="0 0 240 120" width="230" height="115" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g class="paw-frame-open">
                                        <path d="M0 35 C45 32 95 36 140 38 C158 35 178 32 192 38 C202 34 212 40 216 48 C222 56 220 68 214 74 C206 82 192 82 178 80 C155 82 95 84 0 88 Z" stroke="#581c87" stroke-width="4.5" stroke-linejoin="round" fill="#ffffff"/>
                                        <path d="M45 46 Q55 58 45 74 M85 49 Q98 60 85 77 M125 51 Q136 60 125 76" stroke="#c084fc" stroke-width="3.5" stroke-linecap="round"/>
                                        <ellipse cx="196" cy="40" rx="9" ry="7" transform="rotate(-20 196 40)" stroke="#581c87" stroke-width="4" fill="#faf5ff"/>
                                        <ellipse cx="216" cy="48" rx="9.5" ry="7.5" transform="rotate(-5 216 48)" stroke="#581c87" stroke-width="4" fill="#faf5ff"/>
                                        <ellipse cx="218" cy="65" rx="9.5" ry="7.5" transform="rotate(15 218 65)" stroke="#581c87" stroke-width="4" fill="#faf5ff"/>
                                        <ellipse cx="200" cy="78" rx="9" ry="7" transform="rotate(35 200 78)" stroke="#581c87" stroke-width="4" fill="#faf5ff"/>
                                        <ellipse cx="178" cy="58" rx="10" ry="12" fill="#f472b6"/>
                                        <circle cx="196" cy="42" r="3.5" fill="#f472b6"/>
                                        <circle cx="214" cy="50" r="3.8" fill="#f472b6"/>
                                        <circle cx="216" cy="65" r="3.8" fill="#f472b6"/>
                                        <circle cx="199" cy="77" r="3.5" fill="#f472b6"/>
                                    </g>
                                    <g class="paw-frame-closed">
                                        <path d="M0 35 C45 32 95 36 140 38 C160 36 182 38 194 48 C204 56 202 70 192 78 C178 84 158 82 140 80 C95 84 45 82 0 88 Z" stroke="#581c87" stroke-width="4.5" stroke-linejoin="round" fill="#ffffff"/>
                                        <path d="M45 46 Q55 58 45 74 M85 49 Q98 60 85 77 M125 51 Q136 60 125 76" stroke="#c084fc" stroke-width="3.5" stroke-linecap="round"/>
                                        <path d="M182 43 C192 41 202 46 202 54 C202 60 194 62 186 60" stroke="#581c87" stroke-width="4" fill="#faf5ff"/>
                                        <path d="M190 52 C204 52 208 60 206 68 C204 74 192 74 184 68" stroke="#581c87" stroke-width="4" fill="#faf5ff"/>
                                        <path d="M184 64 C198 66 200 75 194 82 C188 88 178 84 174 76" stroke="#581c87" stroke-width="4" fill="#faf5ff"/>
                                        <path d="M165 74 C175 82 185 80 185 72 C185 66 175 66 168 70" stroke="#581c87" stroke-width="4" fill="#faf5ff"/>
                                        <path d="M212 45 L222 40 M216 60 L228 60 M212 75 L222 80" stroke="#7e22ce" stroke-width="3" stroke-linecap="round"/>
                                    </g>
                                </svg>
                            </div>

                        <div class="card card-primary shadow-sm border-0 position-relative" style="z-index: 10;">
                            <div class="card-body p-4 p-md-4">
                                <div class="text-center mb-3">
                                    <h5 class="text-dark font-weight-bold mb-1">Selamat Datang!</h5>
                                    <p class="text-muted text-small mb-0">Silakan masuk menggunakan akun Anda, atau ajukan akun baru jika belum terdaftar.</p>
                                </div>

                                @if (session('gagal_login'))
                                <div class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        <i class="fas fa-exclamation-circle mr-1"></i> {{ session('gagal_login') }}
                                    </div>
                                </div>
                                @endif

                                <form method="POST" action="{{ url('/login') }}" class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="username">Username</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Masukkan username" tabindex="1" required autofocus>
                                            <div class="invalid-feedback">
                                                Mohon masukkan username Anda
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <label for="password" class="control-label mb-0">Password</label>
                                            <a href="{{ route('lupaPassword') }}" class="text-small text-primary">
                                                Lupa Password?
                                            </a>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            </div>
                                            <input id="password" type="password" class="form-control" name="password" placeholder="Masukkan password" tabindex="2" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" data-target="#password" onclick="togglePasswordVisibility(this)" title="Lihat / Sembunyikan Password">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                            <div class="invalid-feedback">
                                                Mohon masukkan password Anda
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block shadow-sm" tabindex="3">
                                            <i class="fas fa-sign-in-alt mr-1"></i> Masuk Sekarang
                                        </button>
                                    </div>

                                    <div class="text-center mt-4 pt-2">
                                        <span class="text-muted">Belum memiliki akun?</span>
                                        <a href="{{ route('pengajuanAkun') }}" class="font-weight-bold ml-1 text-primary">Ajukan Akun Baru</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>

                        <div class="simple-footer text-center mt-3 mb-1 text-small text-muted">
                            Copyright &copy; {{ date('Y') }} Perhimpunan Dokter Hewan Indonesia - Cabang Banten II
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

    <!-- Template JS File -->
    <script src="{{ asset('stisla/js/scripts.js') }}"></script>
    <script src="{{ asset('stisla/js/custom.js') }}?v={{ filemtime(public_path('stisla/js/custom.js')) }}"></script>
</body>

</html>
