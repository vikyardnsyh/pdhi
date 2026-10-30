<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Lupa Password - PDHI Banten II</title>
    <link rel="shortcut icon" href="{{ asset('img/pdhi_logo_transparent.png') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('common/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('stisla/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/css/custom.css') }}?v={{ filemtime(public_path('stisla/css/custom.css')) }}">
</head>

<body class="bg-light">
    <div id="app">
        <div class="container py-4 py-md-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="card card-warning shadow-sm border-0">
                        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center">
                            <img src="{{ asset('img/pdhi_logo.jpg') }}" width="60" height="60" alt="Logo PDHI" class="rounded-circle mr-3 shadow-sm">
                            <div>
                                <h4 class="mb-1 text-dark font-weight-bold">Bantuan Lupa Password</h4>
                                <small class="text-muted">Prosedur Pengajuan Reset Password Akun PDHI Banten II</small>
                            </div>
                        </div>

                        <div class="card-body p-4 p-md-5">
                            <p class="text-dark font-weight-600 mb-4">
                                Jika Anda lupa kata sandi akun PDHI Banten II, silakan ikuti petunjuk berikut untuk mendapatkan kata sandi sementara:
                            </p>

                            <div class="mb-4">
                                <div class="d-flex mb-3">
                                    <div class="badge badge-warning rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; min-width: 28px;">1</div>
                                    <div class="text-dark">
                                        Layanan reset password ini hanya diperuntukkan bagi anggota yang sudah memiliki akun di sistem PDHI Banten II.
                                    </div>
                                </div>

                                <div class="d-flex mb-3">
                                    <div class="badge badge-warning rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; min-width: 28px;">2</div>
                                    <div class="text-dark">
                                        Siapkan data <strong>Nama Lengkap</strong> beserta <strong>Username</strong> akun yang Anda gunakan.
                                    </div>
                                </div>

                                <div class="d-flex mb-3">
                                    <div class="badge badge-warning rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; min-width: 28px;">3</div>
                                    <div class="text-dark flex-grow-1">
                                        Format pesan pengajuan via WhatsApp Sekretariat:
                                        <div class="bg-light p-3 rounded mt-2 border text-monospace text-dark">
                                            <strong>Nama Lengkap :</strong> Dr. drh. ... ...<br>
                                            <strong>Username     :</strong> ernest
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex mb-3">
                                    <div class="badge badge-warning rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; min-width: 28px;">4</div>
                                    <div class="text-dark">
                                        Kirim pesan ke Sekretariat PDHI Banten II:
                                        <div class="mt-2">
                                            <a href="https://wa.me/62895346222492?text=Halo%20Sekretariat%20PDHI%20Banten%20II,%20saya%20lupa%20password%20akun%20saya.%20Mohon%20bantuannya%20untuk%20reset%20password." target="_blank" class="btn btn-success btn-lg">
                                                <i class="fab fa-whatsapp mr-1"></i> Hubungi WhatsApp Sekretariat
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="badge badge-warning rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; min-width: 28px;">5</div>
                                    <div class="text-muted">
                                        Setelah diverifikasi, Sekretariat akan memberikan password sementara. Begitu berhasil masuk, segera ubah password Anda di menu <strong>Ubah Password</strong>.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-white border-top d-flex justify-content-between align-items-center flex-wrap p-3">
                            <span class="text-muted font-weight-600 mb-2 mb-sm-0">PDHI Cabang Banten II</span>
                            <a class="btn btn-primary shadow-sm" href="{{ route('login') }}" role="button">
                                <i class="fas fa-arrow-left mr-1"></i> Kembali ke Halaman Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('common/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('common/js/popper.min.js') }}"></script>
    <script src="{{ asset('common/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('stisla/js/stisla.js') }}"></script>
    <script src="{{ asset('stisla/js/custom.js') }}?v={{ filemtime(public_path('stisla/js/custom.js')) }}"></script>
</body>

</html>
