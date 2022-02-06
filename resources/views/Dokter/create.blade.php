<!DOCTYPE html>
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
<script src="{{ asset('js/bootstrap.min.js') }}"></script>