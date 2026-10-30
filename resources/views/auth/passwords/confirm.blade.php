<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Konfirmasi Password - PDHI Banten II</title>
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

<body class="bg-light">
    <div id="app">
        <section class="section">
            <div class="container py-4 py-md-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="card card-primary shadow-sm border-0">
                            <div class="card-header bg-white border-bottom py-3 d-flex align-items-center">
                                <img src="{{ asset('img/pdhi_logo.jpg') }}" width="50" height="50" alt="Logo PDHI" class="rounded-circle mr-3 shadow-sm">
                                <div>
                                    <h4 class="mb-0 text-dark font-weight-bold">Konfirmasi Password</h4>
                                    <small class="text-muted">Harap konfirmasi kata sandi Anda sebelum melanjutkan</small>
                                </div>
                            </div>

                            <div class="card-body p-4">
                                <form method="POST" action="{{ Route::has('password.confirm') ? route('password.confirm') : url('/password/confirm') }}">
                                    @csrf

                                    <div class="form-group mb-4">
                                        <label for="password" class="font-weight-600">Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            </div>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan password Anda">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" data-target="#password" onclick="togglePasswordVisibility(this)" title="Lihat / Sembunyikan Password">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary btn-block btn-lg">
                                            <i class="fas fa-check mr-1"></i> Konfirmasi Password
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="card-footer bg-light border-top text-center p-3">
                                <a href="{{ url('/') }}" class="text-small text-muted font-weight-600">
                                    <i class="fas fa-arrow-left mr-1"></i> Batal / Kembali ke Beranda
                                </a>
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
    <script src="{{ asset('stisla/js/stisla.js') }}"></script>
    <script src="{{ asset('stisla/js/scripts.js') }}"></script>
    <script src="{{ asset('stisla/js/custom.js') }}?v={{ filemtime(public_path('stisla/js/custom.js')) }}"></script>
</body>

</html>