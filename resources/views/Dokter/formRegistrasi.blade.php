@extends('layouts.pengguna')
@section('title', 'Form Registrasi')
@section('sidebar')
@endsection

@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Registrasi (Kalo status terdaftar / perpanjang : Button submit di muted)</h1>
            </div>
            <div class="row justify-content-center">
                <div class="card col-12 col-md-6 col-lg-10 card-primary">
                    <div class="card-header">
                        <h4>Form Registrasi Anggota</h4>
                    </div>
                    <div class="card-body">
                        <span>Kolom dengan tanda * wajib diisi</span>
                        @foreach ($data as $key => $value)
                            <form method="POST" action="{{ url('formRegistrasi/' . $id) }}">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="_method" value="PATCH">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Nama Lengkap (Dengan Gelar Sesuai KTA)</label><span
                                            class="text-danger">*</span>
                                        <input type="text" class="form-control" name="nama_lengkap"
                                            value="{{ $DataDokter }}">
                                        @foreach ($errors->get('nama_lengkap') as $msg)
                                            <p class="text-danger">{{ $msg }}</p>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Panggilan</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" placeholder="Ex : Budi Hermawan"
                                            name="nama_panggilan" value="{{ $value->nama_panggilan }}">
                                        @foreach ($errors->get('nama_panggilan') as $msg)
                                            <p class="text-danger">{{ $msg }}</p>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" placeholder="Ex : Surabaya"
                                            name="tempat_lahir" value="{{ $value->tempat_lahir }}">
                                        @foreach ($errors->get('tempat_lahir') as $msg)
                                            <p class="text-danger">{{ $msg }}</p>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label><span class="text-danger">*</span>
                                        <div class="input-group date" data-provide="datepicker"
                                            data-date-format="dd-mm-yyyy">
                                            <input type="text" class="form-control" name="tanggal_lahir"
                                                value="{{ $value->tanggal_lahir }}">
                                            <div class="input-group-addon">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                        @foreach ($errors->get('tanggal_lahir') as $msg)
                                            <p class="text-danger">{{ $msg }}</p>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label><span class="text-danger">*</span>
                                        <select name="jenis_kelamin" class="form-control">
                                            <option
                                                {{ old('jenis_kelamin', $value->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}
                                                value="Laki-Laki">Laki-Laki</option>>
                                            <option
                                                {{ old('jenis_kelamin', $value->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}
                                                value="Perempuan">Perempuan</option>>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Alumni</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" placeholder="Ex : Universitas Brawijaya"
                                            name="alumni" value="{{ $value->alumni }}">
                                        @foreach ($errors->get('alumni') as $msg)
                                            <p class="text-danger">{{ $msg }}</p>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun Alumni</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" placeholder="Ex : 2009"
                                            name="tahun_alumni" value="{{ $value->tahun_alumni }}">
                                        @foreach ($errors->get('tahun_alumni') as $msg)
                                            <p class="text-danger">{{ $msg }}</p>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Lengkap Pasangan</label>
                                        <input type="text" class="form-control" placeholder="Ex : Widya Nuraini"
                                            name="nama_pasangan" value="{{ $value->nama_pasangan }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Rumah</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control"
                                            placeholder="Ex : Jl. Baru 1 No.95, RT.01/RW.02, Poris Plawad Utara, Cipondoh, Tangerang, Banten"
                                            name="alamat_rumah" value="{{ $value->alamat_rumah }}">
                                        @foreach ($errors->get('alamat_rumah') as $msg)
                                            <p class="text-danger">{{ $msg }}</p>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label>No. Telp / HP</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" placeholder="Ex : 081247526640"
                                            name="no_telp" value="{{ $value->no_telp }}">
                                        @foreach ($errors->get('no_telp') as $msg)
                                            <p class="text-danger">{{ $msg }}</p>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control"
                                            placeholder="Ex : budihermawan15@gmail.com" name="email"
                                            value="{{ $value->email }}">
                                        @foreach ($errors->get('email') as $msg)
                                            <p class="text-danger">{{ $msg }}</p>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label>Bidang Kerja Veteriner</label><span class="text-danger">*</span>
                                        <select name="bidang_kerja" class="form-control">
                                            <option
                                                {{ old('bidang_kerja', $value->bidang_kerja) == 'Praktek Dokter Hewan' ? 'selected' : '' }}
                                                value="Praktek Dokter Hewan">Praktek Dokter Hewan</option>
                                            <option
                                                {{ old('bidang_kerja', $value->bidang_kerja) == 'Peneliti, Konsultan atau Pengajar' ? 'selected' : '' }}
                                                value="Peneliti, Konsultan atau Pengajar">Peneliti, Konsultan atau Pengajar
                                            </option>
                                            <option
                                                {{ old('bidang_kerja', $value->bidang_kerja) == 'Perusahaan Swasta' ? 'selected' : '' }}
                                                value="Perusahaan Swasta">Perusahaan Swasta</option>
                                            <option
                                                {{ old('bidang_kerja', $value->bidang_kerja) == 'Pegawai Negeri Sipil' ? 'selected' : '' }}
                                                value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                                            <option
                                                {{ old('bidang_kerja', $value->bidang_kerja) == 'Wirausaha' ? 'selected' : '' }}
                                                value="Wirausaha">Wirausaha</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Klinik (Tempat Praktek / Kerja)</label>
                                        <input type="text" class="form-control" placeholder="Ex : Happy Vet"
                                            name="nama_klinik" value="{{ $value->nama_klinik }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Klinik (Tempat Praktek / Kerja)</label>
                                        <input type="text" class="form-control"
                                            placeholder="Ex : Jl. Teuku Umar No.12, RT.04/RW.05, Bojong Jaya, Karawaci, Tangerang, Banten"
                                            name="alamat_klinik" value="{{ $value->alamat_klinik }}">
                                    </div>
                                    <div class="form-group">
                                        <label>No. Telp / Fax Klinik (Tempat Praktek / Kerja)</label>
                                        <input type="text" class="form-control" placeholder="Ex : 0217229331"
                                            name="no_telp_klinik" value="{{ $value->no_telp_klinik }}">
                                        @foreach ($errors->get('no_telp_klinik') as $msg)
                                            <p class="text-danger">{{ $msg }}</p>
                                        @endforeach
                                    </div>
                                </div>
                                <a class="btn btn-primary" href="/formRegistrasi" role="button">Reset</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection