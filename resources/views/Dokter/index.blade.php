<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Dokter</title>
</head>
<body>
<br>
    <a class="btn btn-primary" href="{{ url('dokter/create') }}" role="button">Tambah Data Dokter</a>
    <br>
    <br>
    <table style="border: 2px solid black">
        <tr style="background-color:#00FF00">
            <th>Nama Lengkap</th>
            <th>Nama Panggilan</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alumni</th>
            <th>Tahun Alumni</th>
            <th>Nama Pasangan</th>
            <th>Alamat Rumah</th>
            <th>No. Telp</th>
            <th>Email</th>
            <th>Bidang Kerja</th>
        </tr>
        @foreach($data as $key=>$value)
        <tr>
            <td>{{ $value->nama_lengkap }}</td>
            <td>{{ $value->nama_panggilan }}</td>
            <td>{{ $value->tempat_lahir }}</td>
            <td>{{ $value->tanggal_lahir }}</td>
            <td>{{ $value->jenis_kelamin }}</td>
            <td>{{ $value->alumni }}</td>
            <td>{{ $value->tahun_alumni }}</td>
            <td>{{ $value->nama_pasangan }}</td>
            <td>{{ $value->alamat_rumah }}</td>
            <td>{{ $value->no_telp }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->bidang_kerja }}</td> 
        </tr>
        @endforeach
    </table>
</body>
</html>

<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<script src="{{ asset('js/bootstrap.min.js') }}"></script>