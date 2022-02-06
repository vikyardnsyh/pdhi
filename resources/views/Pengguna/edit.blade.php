<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Akun Pengguna</title>
</head>
<body>
    <br>
    <form method = "POST" action="{{ url('pengguna/'.$model->username) }}">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
    Username    : <input type="text" name="username" value="{{$model->username}}"><br>
    Password    : <input type="text" name="password" value="{{$model->password}}"><br>
    Status Akun : <input type="text" name="status_pengguna" value="{{$model->status_pengguna}}"><br>
    Kelas Akun  : <input type="text" name="id_kelas_pengguna" value="{{$model->id_kelas_pengguna}}"><br><br>

    <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</body>
</html>

<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<script src="{{ asset('js/bootstrap.min.js') }}"></script>