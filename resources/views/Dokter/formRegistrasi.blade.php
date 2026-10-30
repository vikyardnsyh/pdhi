@extends('layouts.pengguna')
@section('title', 'Form Registrasi Anggota')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Form Registrasi</h1>
                <small class="text-muted">Lengkapi data profil keanggotaan PDHI Banten II Anda</small>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-9">
                <div class="card card-primary shadow-sm">
                    <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                        <h4 class="text-dark font-weight-bold mb-0">
                            <i class="fas fa-user-edit text-primary mr-2"></i> Formulir Biodata Anggota
                        </h4>
                        <span class="text-muted text-small"><span class="text-danger">*</span> Kolom wajib diisi</span>
                    </div>

                    <div class="card-body p-4">
                        @foreach ($data as $key => $value)
                        @php
                            $tanggal_lahir2 = !empty($value->tanggal_lahir) ? date('d-m-Y', strtotime($value->tanggal_lahir)) : '';
                        @endphp

                        <form method="POST" action="{{ url('formRegistrasi/' . $id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">

                            {{-- Section 1: Data Identitas Pribadi --}}
                            <div class="section-title mt-0 mb-3 text-primary font-weight-bold">
                                <i class="fas fa-id-card mr-1"></i> 1. Identitas Pribadi
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 form-group">
                                    <label>Nama Lengkap (Dengan Gelar Sesuai KTA) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap', $DataDokter) }}" required>
                                    @foreach ($errors->get('nama_lengkap') as $msg)
                                        <div class="invalid-feedback d-block">{{ $msg }}</div>
                                    @endforeach
                                </div>

                                <div class="col-12 col-md-6 form-group">
                                    <label>Nama Panggilan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama_panggilan') is-invalid @enderror" placeholder="Contoh: Budi" name="nama_panggilan" value="{{ old('nama_panggilan', $value->nama_panggilan) }}" required>
                                    @foreach ($errors->get('nama_panggilan') as $msg)
                                        <div class="invalid-feedback d-block">{{ $msg }}</div>
                                    @endforeach
                                </div>

                                <div class="col-12 col-md-4 form-group">
                                    <label>Tempat Lahir <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Contoh: Surabaya" name="tempat_lahir" value="{{ old('tempat_lahir', $value->tempat_lahir) }}" required>
                                    @foreach ($errors->get('tempat_lahir') as $msg)
                                        <div class="invalid-feedback d-block">{{ $msg }}</div>
                                    @endforeach
                                </div>

                                <div class="col-12 col-md-4 form-group">
                                    <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                    <div class="input-group date" data-provide="datepicker" data-date-format="dd-mm-yyyy" data-date-autoclose="true">
                                        <input type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir', $tanggal_lahir2) }}" placeholder="Pilih tanggal">
                                        <div class="input-group-append" style="cursor: pointer;">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                    @foreach ($errors->get('tanggal_lahir') as $msg)
                                        <div class="invalid-feedback d-block">{{ $msg }}</div>
                                    @endforeach
                                </div>

                                <div class="col-12 col-md-4 form-group">
                                    <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option {{ old('jenis_kelamin', $value->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }} value="Laki-Laki">Laki-Laki</option>
                                        <option {{ old('jenis_kelamin', $value->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }} value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <hr class="my-4">

                            {{-- Section 2: Pendidikan & Keluarga --}}
                            <div class="section-title mt-0 mb-3 text-primary font-weight-bold">
                                <i class="fas fa-graduation-cap mr-1"></i> 2. Pendidikan & Keluarga
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4 form-group">
                                    <label>Alumni Universitas <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('alumni') is-invalid @enderror" placeholder="Contoh: IPB, UGM" name="alumni" value="{{ old('alumni', $value->alumni) }}" required>
                                    @foreach ($errors->get('alumni') as $msg)
                                        <div class="invalid-feedback d-block">{{ $msg }}</div>
                                    @endforeach
                                </div>

                                <div class="col-12 col-md-4 form-group">
                                    <label>Tahun Kelulusan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('tahun_alumni') is-invalid @enderror" placeholder="Contoh: 2018" name="tahun_alumni" value="{{ old('tahun_alumni', $value->tahun_alumni) }}" required>
                                    @foreach ($errors->get('tahun_alumni') as $msg)
                                        <div class="invalid-feedback d-block">{{ $msg }}</div>
                                    @endforeach
                                </div>

                                <div class="col-12 col-md-4 form-group">
                                    <label>Nama Pasangan</label>
                                    <input type="text" class="form-control" placeholder="Nama suami / istri (jika ada)" name="nama_pasangan" value="{{ old('nama_pasangan', $value->nama_pasangan) }}">
                                </div>
                            </div>

                            <hr class="my-4">

                            {{-- Section 3: Kontak & Alamat --}}
                            <div class="section-title mt-0 mb-3 text-primary font-weight-bold">
                                <i class="fas fa-home mr-1"></i> 3. Kontak & Domisili
                            </div>
                            <div class="row">
                                <div class="col-12 form-group">
                                    <label>Alamat Rumah Lengkap <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('alamat_rumah') is-invalid @enderror" rows="2" placeholder="Masukkan alamat domisili lengkap beserta RT/RW, Kelurahan, Kecamatan, Kota/Kabupaten" name="alamat_rumah" required>{{ old('alamat_rumah', $value->alamat_rumah) }}</textarea>
                                    @foreach ($errors->get('alamat_rumah') as $msg)
                                        <div class="invalid-feedback d-block">{{ $msg }}</div>
                                    @endforeach
                                </div>

                                <div class="col-12 col-md-6 form-group">
                                    <label>No. Telp / HP (WhatsApp) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror" placeholder="Contoh: 08123456789" name="no_telp" value="{{ old('no_telp', $value->no_telp) }}" required>
                                    @foreach ($errors->get('no_telp') as $msg)
                                        <div class="invalid-feedback d-block">{{ $msg }}</div>
                                    @endforeach
                                </div>

                                <div class="col-12 col-md-6 form-group">
                                    <label>Alamat Email Aktif <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Contoh: dokter@email.com" name="email" value="{{ old('email', $value->email) }}" required>
                                    @foreach ($errors->get('email') as $msg)
                                        <div class="invalid-feedback d-block">{{ $msg }}</div>
                                    @endforeach
                                </div>
                            </div>

                            <hr class="my-4">

                            {{-- Section 4: Tempat Praktek / Kerja --}}
                            <div class="section-title mt-0 mb-3 text-primary font-weight-bold">
                                <i class="fas fa-clinic-medical mr-1"></i> 4. Pekerjaan & Tempat Praktek
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 form-group">
                                    <label>Bidang Kerja Veteriner <span class="text-danger">*</span></label>
                                    <select name="bidang_kerja" class="form-control">
                                        <option {{ old('bidang_kerja', $value->bidang_kerja) == 'Praktek Dokter Hewan' ? 'selected' : '' }} value="Praktek Dokter Hewan">Praktek Dokter Hewan</option>
                                        <option {{ old('bidang_kerja', $value->bidang_kerja) == 'Peneliti, Konsultan atau Pengajar' ? 'selected' : '' }} value="Peneliti, Konsultan atau Pengajar">Peneliti, Konsultan atau Pengajar</option>
                                        <option {{ old('bidang_kerja', $value->bidang_kerja) == 'Perusahaan Swasta' ? 'selected' : '' }} value="Perusahaan Swasta">Perusahaan Swasta</option>
                                        <option {{ old('bidang_kerja', $value->bidang_kerja) == 'Pegawai Negeri Sipil' ? 'selected' : '' }} value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                                        <option {{ old('bidang_kerja', $value->bidang_kerja) == 'Wirausaha' ? 'selected' : '' }} value="Wirausaha">Wirausaha</option>
                                    </select>
                                </div>

                                <div class="col-12 col-md-6 form-group">
                                    <label>Nama Klinik / Instansi</label>
                                    <input type="text" class="form-control" placeholder="Contoh: Klinik Hewan Sejahtera" name="nama_klinik" value="{{ old('nama_klinik', $value->nama_klinik) }}">
                                </div>

                                <div class="col-12 col-md-8 form-group">
                                    <label>Alamat Tempat Kerja / Klinik</label>
                                    <input type="text" class="form-control" placeholder="Contoh: Jl. Sudirman No. 12, Tangerang" name="alamat_klinik" value="{{ old('alamat_klinik', $value->alamat_klinik) }}">
                                </div>

                                <div class="col-12 col-md-4 form-group">
                                    <label>No. Telp / Fax Klinik</label>
                                    <input type="text" class="form-control @error('no_telp_klinik') is-invalid @enderror" placeholder="Contoh: 021-5551234" name="no_telp_klinik" value="{{ old('no_telp_klinik', $value->no_telp_klinik) }}">
                                    @foreach ($errors->get('no_telp_klinik') as $msg)
                                        <div class="invalid-feedback d-block">{{ $msg }}</div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Form Actions --}}
                            <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                                <a class="btn btn-outline-secondary mr-2" href="{{ url('/formRegistrasi') }}" role="button">
                                    <i class="fas fa-undo mr-1"></i> Batal / Reset
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-1"></i> {{ is_null($value->tanggal_terdaftar) ? 'Simpan Data' : 'Perbarui Data' }}
                                </button>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
