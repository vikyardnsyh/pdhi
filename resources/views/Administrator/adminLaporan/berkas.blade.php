<!DOCTYPE html>
<html>
<head>
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
    <title>Berkas Dokter</title>
</head>
<body>
    <table>
        <tr>
            <td width="30"></td>
            <td><img src="{{ public_path('img/pdhi_logo.jpg') }}" width="130"></td>
            <td width="30"></td>
            <td style='text-align:center; vertical-align:middle'>
                <u>PERHIMPUNAN DOKTER HEWAN INDONESIA</u><br>
                <b>INDONESIAN VETERINARY MEDICAL ASSOCIATION</b><br>
                <b>CABANG BANTEN II</b><br>
                Sekretariat : Boulevard Orlin Arcade 2. JB03. Lt.2 Graha Raya<br>
                Paku Jaya-Tangerang Selatan<br>
                HP/WA : 087871017429<br>
                Email : pdhicabangbanten2@gmail.com atau banten2@pdhi.or.id
            </td>
        </tr>
    </table>
    <hr>
    <center>
        <u><h4>FORMULIR PENDAFTARAN ANGGOTA PDHI BANTEN II</h4></u>
    </center>

    @foreach ($data as $key => $value)
    <table cellpadding="7">
        <tr>
            <td>Nama Lengkap</td>
            <td>: {{ $value->nama_lengkap }}</td>
        </tr>
        <tr>
            <td>Nama Panggilan</td>
            <td>: {{ $value->nama_panggilan }}</td>
        </tr>
        <tr>
            <td>Tempat/Tanggal Lahir</td>
            <td>: {{ !empty($value->tempat_lahir) ? $value->tempat_lahir . ', ' . date('d-M-Y', strtotime($value->tanggal_lahir)) : '-' }}</td>
        </tr>
        <tr>
            <td>Alumni</td>
            <td>: {{ $value->alumni ?? '-' }}</td>
        </tr>
        <tr>
            <td>Tahun Alumni</td>
            <td>: {{ $value->tahun_alumni ?? '-' }}</td>
        </tr>
        <tr>
            <td>Nama Pasangan</td>
            <td>: {{ $value->nama_pasangan ?? '-' }}</td>
        </tr>
        <tr>
            <td>Alamat Rumah</td>
            <td>: {{ $value->alamat_rumah ?? '-' }}</td>
        </tr>
        <tr>
            <td>No. Telp</td>
            <td>: {{ $value->no_telp ?? '-' }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: {{ $value->email ?? '-' }}</td>
        </tr>
        <tr>
            <td>Bidang Kerja Veteriner</td>
            <td>: {{ $value->bidang_kerja ?? '-' }}</td>
        </tr>
        <tr>
            <td>Nama & Alamat Tempat Kerja</td>
            <td>: {{ !empty($value->nama_klinik) ? $value->nama_klinik . ', ' . ($value->alamat_klinik ?? '') : '-' }}</td>
        </tr>
        <tr>
            <td>No. Telp/Fax</td>
            <td>: {{ $value->no_telp_klinik ?? '-' }}</td>
        </tr>
    </table>
    <br><br><br><br><br>
    <p style="text-align: right;">Tangerang, {{ $tanggal }}</p>
    <p style="text-align: right;">Tertanda,</p>
    <br><br><br>
    <p style="text-align: right;">{{ $value->nama_lengkap }}</p><br>
    @endforeach

    @php
    $berkasTitles = [
        'pas_foto'      => 'PAS FOTO',
        'ijazah'        => 'IJAZAH',
        'ktp'           => 'KTP',
        'kta'           => 'KTA',
        'strv'          => 'STRV',
        'skdhi'         => 'SKDHI',
        'tf_daftar'     => 'BUKTI TF. DAFTAR',
        'tf_registrasi' => 'BUKTI TF. KEANGGOTAAN',
    ];
    @endphp

    @foreach ($berkasTitles as $jenis => $title)
        @php
            $file = $dataBerkas->where('jenis_berkas', $jenis)->pluck('nama_berkas')->first();
            $filePath = !empty($file) ? public_path('img/berkas_dokter/' . $file) : null;
            $hasValidImage = $filePath && file_exists($filePath) && !str_ends_with(strtolower($file), '.pdf');
        @endphp
        <div class="page-break"></div>
        <u><h5>BERKAS ANGGOTA {{ $title }}</h5></u>
        <br>
        <center>
            @if ($hasValidImage)
                <img src="{{ $filePath }}" width="350">
            @else
                <img src="{{ public_path('img/no_image.jpg') }}" width="350">
            @endif
        </center>
    @endforeach
</body>
</html>
