<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Akun Pengguna</title>
</head>
<body>
<br>
    <br>
    <a class = "btn btn-primary" href ="{{ url('pengguna/create')}}"> Tambah Pengguna </a>
    <br>
    <br>
    <table style="border: 2px solid black">
        <tr style="background-color:#00FF00">
            <th>Username</th>
            <th>Password</th>
            <th>Status Akun</th>
            <th>Kelas Akun</th>
            <th colspan="2">asdasdasdasdasdas</th>
        </tr>
        @foreach($data as $key=>$value)
        <tr>
        @if ($value->status_pengguna === 1)
            @php $status = "Aktif" @endphp
        @elseif ($value->status_pengguna === 2)
            @php $status = "Non Aktif" @endphp
        @endif
        
            <td>{{ $value->username }}</td>
            <td>{{ $value->password }}</td>
            <td>{{$status}}</td>
            <td>{{ $value->nama_kelas_pengguna }}</td>
            <td><a class="btn btn-primary" href="{{url('pengguna/'.$value->username.'/edit')}}"> Edit </a></td>
            <td>
                <form action="{{url('pengguna/'.$value->username)}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger" type="submit">Hapus</button> 
                </form>
            </td>
            
        </tr>
        @endforeach
    </table>
</body>
</html>

<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<script src="{{ asset('js/bootstrap.min.js') }}"></script>