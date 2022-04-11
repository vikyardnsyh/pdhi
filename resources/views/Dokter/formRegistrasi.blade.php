@extends('layouts.pengguna')
@section('title', 'Form Registrasi')
@section('sidebar')
@endsection

@section('content')
    <script type="text/javascript">
        $('.datepicker').datepicker({
            inline: true
        });
    </script>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Registrasi</h1>
            </div>
            <div class="row justify-content-center">
                <div class="card col-12 col-md-6 col-lg-10 card-dark">
                    <div class="card-header">
                        <h4>Form Registrasi Anggota</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('formRegistrasi') }}">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Nama Lengkap (Dengan Gelar)</label>
                                    <input type="text" class="form-control"
                                        placeholder="Ex : Dr. drh. Budi Hermawan, M.Si">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Nama Panggilan</label>
                                    <input type="text" class="form-control" placeholder="Ex : Budi Hermawan">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" placeholder="Ex : Surabaya">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker"
                                    inline="true">
                                    <input placeholder="Select date" type="text" id="example" class="form-control">
                                    <i class="fas fa-calendar input-prefix"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <input type="text" class="form-control" placeholder="Ex : Radio button">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Alumni</label>
                                    <input type="text" class="form-control" placeholder="Ex : Universitas Brawijaya">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Tahun Alumni</label>
                                    <input type="text" class="form-control" placeholder="Ex : 2009">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Nama Lengkap Pasangan</label>
                                    <input type="text" class="form-control" placeholder="Ex : Widya Nuraini">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Alamat Rumah</label>
                                    <input type="text" class="form-control" placeholder="Ex : Jl. Baru 1 No.95, RT.01/RW.02, Poris Plawad Utara, Cipondoh, Tangerang, Banten ">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>No. Telp / HP</label>
                                    <input type="text" class="form-control" placeholder="Ex : 081247526640">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Ex : budihermawan15@gmail.com">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Bidang Kerja Veteriner</label>
                                    <input type="text" class="form-control" placeholder="Ex : ???">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Nama Klinik (Tempat Praktek / Kerja)</label>
                                    <input type="text" class="form-control" placeholder="Ex : Happy Vet">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Alamat Klinik (Tempat Praktek / Kerja)</label>
                                    <input type="text" class="form-control" placeholder="Ex : Jl. Teuku Umar No.12, RT.04/RW.05, Bojong Jaya, Karawaci, Tangerang, Banten">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>No. Telp / Fax Klinik (Tempat Praktek / Kerja)</label>
                                    <input type="text" class="form-control" placeholder="Ex : ???">
                                </div>
                            </div>

                            <a class="btn btn-primary" href="/formRegistrasi" role="button">Reset</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Dokter</title>
</head>
<body>
<br>
    <form method="POST" action="{{ url('dokter') }}"></form>
    @csrf
    Nama Lengkap : <input type="text" name="nama_lengkap"><br>
    Nama Panggilan : <input type="text" name="nama_panggilan"><br>
    Tempat Lahir : <input type="text" name="tempat_lahir"><br>
    Tanggal Lahir : <input type="text" name="tanggal_lahir"><br>
    Jenis Kelamin : <input type="text" name="jenis_kelamin"><br>
    Alumni : <input type="text" name="alumni"><br>
    Tahun Alumni : <input type="text" name="tahun_alumni"><br>
    Nama Pasangan : <input type="text" name="nama_pasangan"><br>
    Alamat Rumah : <input type="text" name="alamat_rumah"><br>
    No. Telp : <input type="text" name="no_telp"><br>
    Email : <input type="text" name="email"><br>
    Bidang Kerja : <input type="text" name="bidang_kerja"><br>
    Username : <input type="text" name="username"><br>
    <br>
    <button class="btn btn-primary">Simpan</button>
</body>
</html>

<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
