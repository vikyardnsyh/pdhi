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
            <td><img src="{{ asset('img/pdhi_logo.jpg') }}" width="130"></td>
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
    <center><u>
            <h4>FORMULIR PENDAFTARAN ANGGOTA PDHI BANTEN II</h4>
        </u></center>
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
            <td>Nama Lengkap</td>
            <td>: {{ $value->nama_lengkap }}</td>
        </tr>
        <tr>
            <td>Tempat/Tanggal Lahir</td>
            @if(is_null($value->tempat_lahir))
            <td> </td>
            @else
            <td>: {{ $value->tempat_lahir }}, {{ date('d-M-Y', strtotime($value->tanggal_lahir)) }}</td>
            @endif
        </tr>
        <tr>
            <td>Alumni</td>
            <td>: {{ $value->alumni }}</td>
        </tr>
        <tr>
            <td>Tahun Alumni</td>
            <td>: {{ $value->tahun_alumni }}</td>
        </tr>
        <tr>
            <td>Nama Pasangan</td>
            <td>: {{ $value->nama_pasangan }}</td>
        </tr>
        <tr>
            <td>Alamat Rumah</td>
            <td>: {{ $value->alamat_rumah }}</td>
        </tr>
        <tr>
            <td>No. Telp</td>
            <td>: {{ $value->no_telp }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: {{ $value->email }}</td>
        </tr>
        <tr>
            <td>Bidang Kerja Veteriner</td>
            <td>: {{ $value->bidang_kerja }}</td>
        </tr>
        <tr>
            <td>Nama & Alamat Tempat Kerja</td>
            @if(is_null($value->nama_klinik))
            <td>: </td>
            @else
            <td>: {{ $value->nama_klinik }}, {{ $value->alamat_klinik }}</td>
            @endif
        </tr>
        <tr>
            <td>No. Telp/Fax</td>
            <td>: {{ $value->no_telp_klinik }}</td>
        </tr>
    </table>
    <br><br><br><br><br>
    <p style="text-align: right;">Tangerang, {{ $tanggal }}</p>
    <p style="text-align: right;">Tertanda,</p>
    <br><br><br>
    <p style="text-align: right;">{{ $value->nama_lengkap }}</p><br>
    @endforeach 
    <div class="page-break"></div>
    <u>
        <h5>BERKAS ANGGOTA PAS FOTO</h5>
    </u>
    <br>
    @if(is_null($dataBerkas->where('jenis_berkas','ktp')->pluck('nama_berkas')->first()))
    <center><img src="{{ asset('img/no_image.jpg') }}" width="350"></center>
    @else
    <center><img src="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','pas_foto')->pluck('nama_berkas')->first()) }}" width="350"></center>
    @endif
    <div class="page-break"></div>
    <u>
        <h5>BERKAS ANGGOTA KTP</h5>
    </u>
    <br>
    @if(is_null($dataBerkas->where('jenis_berkas','ktp')->pluck('nama_berkas')->first()))
    <center><img src="{{ asset('img/no_image.jpg') }}" width="350"></center>
    @else
    <center><img src="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','ktp')->pluck('nama_berkas')->first()) }}" width="350"></center>
    @endif
    <div class="page-break"></div>
    <u>
        <h5>BERKAS ANGGOTA KTA</h5>
    </u>
    <br>
    @if(is_null($dataBerkas->where('jenis_berkas','ktp')->pluck('nama_berkas')->first()))
    <center><img src="{{ asset('img/no_image.jpg') }}" width="350"></center>
    @else
    <center><img src="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','kta')->pluck('nama_berkas')->first()) }}" width="350"></center>
    @endif
    <div class="page-break"></div>
    <u>
        <h5>BERKAS ANGGOTA IJAZAH</h5>
    </u>
    <br>
    @if(is_null($dataBerkas->where('jenis_berkas','ktp')->pluck('nama_berkas')->first()))
    <center><img src="{{ asset('img/no_image.jpg') }}" width="350"></center>
    @else
    <center><img src="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','ijazah')->pluck('nama_berkas')->first()) }}" width="350"></center>
    @endif
    <div class="page-break"></div>
    <u>
        <h5>BERKAS ANGGOTA STRV</h5>
    </u>
    <br>
    @if(is_null($dataBerkas->where('jenis_berkas','ktp')->pluck('nama_berkas')->first()))
    <center><img src="{{ asset('img/no_image.jpg') }}" width="350"></center>
    @else
    <center><img src="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','strv')->pluck('nama_berkas')->first()) }}" width="350"></center>
    @endif
    <div class="page-break"></div>
    <u>
        <h5>BERKAS ANGGOTA SKDHI</h5>
    </u>
    <br>
    @if(is_null($dataBerkas->where('jenis_berkas','ktp')->pluck('nama_berkas')->first()))
    <center><img src="{{ asset('img/no_image.jpg') }}" width="350"></center>
    @else
    <center><img src="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','skdhi')->pluck('nama_berkas')->first()) }}" width="350"></center>
    @endif
    <div class="page-break"></div>
    <u>
        <h5>BERKAS ANGGOTA BUKTI TF. DAFTAR</h5>
    </u>
    <br>
    @if(is_null($dataBerkas->where('jenis_berkas','ktp')->pluck('nama_berkas')->first()))
    <center><img src="{{ asset('img/no_image.jpg') }}" width="350"></center>
    @else
    <center><img src="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','tf_daftar')->pluck('nama_berkas')->first()) }}" width="350"></center>
    @endif
    <div class="page-break"></div>
    <u>
        <h5>BERKAS ANGGOTA BUKTI TF. KEANGGOTAAN</h5>
    </u>
    <br>
    @if(is_null($dataBerkas->where('jenis_berkas','ktp')->pluck('nama_berkas')->first()))
    <center><img src="{{ asset('img/no_image.jpg') }}" width="350"></center>
    @else
    <center><img src="{{ asset('img/berkas_dokter/' . $dataBerkas->where('jenis_berkas','tf_registrasi')->pluck('nama_berkas')->first()) }}" width="350"></center>
    @endif
</body>

</html>