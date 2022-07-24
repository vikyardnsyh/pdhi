<table>
    <thead>
        <tr>
            <th style="text-align: center">No.</th>
            <th style="text-align: center">Username</th>
            <th style="text-align: center">Nama Lengkap</th>
            <th style="text-align: center">Nama Panggilan</th>
            <th style="text-align: center">Tempat Lahir</th>
            <th style="text-align: center">Tanggal Lahir</th>
            <th style="text-align: center">Jenis Kelamin</th>
            <th style="text-align: center">Alumni</th>
            <th style="text-align: center">Tahun Alumni</th>
            <th style="text-align: center">Nama Pasangan</th>
            <th style="text-align: center">Alamat Rumah</th>
            <th style="text-align: center">No Telp</th>
            <th style="text-align: center">Email</th>
            <th style="text-align: center">Bidang Kerja</th>
            <th style="text-align: center">Nama Klinik</th>
            <th style="text-align: center">Alamat Klinik</th>
            <th style="text-align: center">No Telp Klinik</th>
            <th style="text-align: center">Domisili Anggota</th>
            <th style="text-align: center">Tanggal Terdaftar</th>
            <th style="text-align: center">Masa Aktif</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($anggota as $data)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{$data->username}}</td>
            <td>{{$data->nama_lengkap}}</td>
            <td>{{$data->nama_panggilan}}</td>
            <td>{{$data->tempat_lahir}}</td>
            <td>{{ date('d-M-Y', strtotime($data->tanggal_lahir)) }}</td>
            <td>{{$data->jenis_kelamin}}</td>
            <td>{{$data->alumni}}</td>
            <td>{{$data->tahun_alumni}}</td>
            <td>{{$data->nama_pasangan}}</td>
            <td>{{$data->alamat_rumah}}</td>
            <td>{{$data->no_telp}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->bidang_kerja}}</td>
            <td>{{$data->nama_klinik}}</td>
            <td>{{$data->alamat_klinik}}</td>
            <td>{{$data->no_telp_klinik}}</td>
            <td>{{$data->domisili_anggota}}</td>
            <td>{{ date('d-M-Y', strtotime($data->tanggal_terdaftar)) }}</td>
            <td>{{ date('d-M-Y', strtotime($data->masa_aktif)) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>