<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Data Dokter</title>
</head>
<body>
    <br>
    <div>
        <a class="btn btn-primary" href="/" role="button">Kembali</a>
        <a class="btn btn-primary" href="{{ url('AdminAkun/create') }}" role="button">Tambah Data Dokter</a>
        <br>
        <br>
        <table>
            <tr>
                <th>No.</th>
                <th>Nama Lengkap</th>
                <th>Telpon</th>
                <th>Email</th>
                <th>Status Keanggotaan</th>
                <th>Domisili Keanggotaan</th>
                <th>Kelas Akun</th>
                <th>Status Akun</th>
                <th colspan="2">asdasdasdasdasdas</th>
            </tr>
            @foreach($data as $key=>$value)
            <tr>
                <td>aa</td>
                <td>{{ $value->nama_lengkap }}</td>
                <td>{{ $value->no_telp }}</td>
                <td>{{ $value->email }}</td>
                <td>DUMMY</td>
            </tr>
            @endforeach
        </table>

    </div>
    
</body>
</html>

<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<script src="{{ asset('js/bootstrap.min.js') }}"></script>