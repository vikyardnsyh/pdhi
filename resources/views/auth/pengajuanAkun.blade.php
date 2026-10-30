<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Pengajuan Akun - PDHI Banten II</title>
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
                    <div class="card card-primary shadow-sm border-0">
                        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center">
                            <img src="{{ asset('img/pdhi_logo.jpg') }}" width="60" height="60" alt="Logo PDHI" class="rounded-circle mr-3 shadow-sm">
                            <div>
                                <h4 class="mb-1 text-dark font-weight-bold">Pengajuan Akun Baru</h4>
                                <small class="text-muted">Prosedur Pembuatan Akun Akses PDHI Cabang Banten II</small>
                            </div>
                        </div>

                        <div class="card-body p-4 p-md-5">
                            <p class="text-dark font-weight-600 mb-4">
                                Persyaratan dan tata cara untuk mengajukan akun akses ke sistem pendaftaran anggota PDHI Cabang Banten II:
                            </p>

                            <div class="mb-4">
                                <div class="d-flex mb-3">
                                    <div class="badge badge-primary rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; min-width: 28px;">1</div>
                                    <div class="text-dark">
                                        Calon anggota diharuskan sudah terdaftar dalam sistem <strong>KTA Online PDHI Pusat</strong>.
                                    </div>
                                </div>

                                <div class="d-flex mb-3">
                                    <div class="badge badge-primary rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; min-width: 28px;">2</div>
                                    <div class="text-dark">
                                        Melampirkan data nama lengkap beserta gelar sesuai yang terdaftar pada sistem KTA Online.
                                    </div>
                                </div>

                                <div class="d-flex mb-3">
                                    <div class="badge badge-primary rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; min-width: 28px;">3</div>
                                    <div class="text-dark">
                                        Melampirkan nomor KTA online resmi Anda.
                                    </div>
                                </div>

                                <div class="d-flex mb-3">
                                    <div class="badge badge-primary rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; min-width: 28px;">4</div>
                                    <div class="text-dark flex-grow-1">
                                        Format pesan pengajuan melalui WhatsApp Sekretariat:
                                        <div class="bg-light p-3 rounded mt-2 border text-monospace text-dark">
                                            <strong>Nama Lengkap :</strong> Dr. drh. ... ...<br>
                                            <strong>No. KTA Online :</strong> 034xxxxxx
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex mb-3">
                                    <div class="badge badge-primary rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; min-width: 28px;">5</div>
                                    <div class="text-dark">
                                        Hubungi Sekretariat PDHI Banten II melalui WhatsApp resmi:
                                        <div class="mt-2">
                                            <a href="https://wa.me/62895346222492?text=Halo%20Sekretariat%20PDHI%20Banten%20II,%20saya%20ingin%20mengajukan%20pembuatan%20akun%20baru." target="_blank" class="btn btn-success btn-lg">
                                                <i class="fab fa-whatsapp mr-1"></i> Hubungi WhatsApp (0895-3462-22492)
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="badge badge-primary rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; min-width: 28px;">6</div>
                                    <div class="text-muted">
                                        Sekretariat akan memverifikasi data Anda. Setelah akun dibuat, Anda akan menerima username dan password untuk masuk ke sistem.
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
