<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Halaman Pengajuan Akun</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('common/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('stisla/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/css/components.css') }}">
</head>

<body>
    <div id="app">
        <div class="main-content">
            <div class="row">
                <div class="col-md-9">
                    <div class="card card-primary mt-n3 shadow p-3 mb-5 bg-white rounded">
                        <div class="card header">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-2">
                                    <div class="p-2 ml-1">
                                        <img src="{{ asset('img/pdhi_logo.jpg') }}" width="80px" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-10 mt-4">
                                    <h6>
                                        Selamat datang!
                                    </h6>
                                    <h6>
                                        Berikut adalah persyaratan pembuatan akun untuk calon anggota.
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="card body">
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <p>Persyaratan dan tata cara untuk mengajukan pembuatan akun akses ke sistem pendaftaran anggota PDHI Cabang Banten II :</p>
                                    <ul>
                                        <li>
                                            Calon anggota diharuskan sudah terdaftar dalam sistem KTA Online PDHI Pusat
                                        </li>
                                        <li>
                                            Melampirkan data nama lengkap dengan gelar sesuai dengan data yang terdaftar pada sistem KTA Online
                                        </li>
                                        <li>
                                            Melampirkan nomor KTA online sesuai dengan data yang terdaftar pada sistem KTA Online
                                        </li>
                                        <li>
                                            Format pengajuan melalui whatsapp sekertariat PDHI Cabang Banten II :
                                        </li>
                                        <div class="text text-muted">
                                            Nama lengkap   : ex. Dr. drh ... ... <br>
                                            No. KTA Online : 034xxxxxx
                                        </div>
                                        <li>
                                            Menghubungi whatsapp sekertariat PDHI Cabang Banten II di nomor <a href="https://wa.me/62895346222492">0895346222492</a> <br> <b>(Klik nomor untuk direct ke whatsapp web anda)*</b> 
                                        </li>
                                        <li>
                                            Sekertariat mungkin membutuhkan waktu untuk melakukan verifikasi data anda, setelah mendapatkan akses berupa username dan password, gunakan untuk mengakses sistem pendaftaran aggota PDHI Cabang Banten II
                                        </li>
                                    </ul>
                                    <p>*Sudah menggunakan dan login dengan whatsapp web atau menginstall whatsapp desktop</p>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary" href="/login" role="button">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
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
