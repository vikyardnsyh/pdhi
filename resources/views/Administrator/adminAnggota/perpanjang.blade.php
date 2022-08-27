@extends('layouts.administrator')
@section('title', 'Administrasi Anggota')
@section('sidebar')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Ubah / Perpanjang Keanggotaan</h1>
        </div>
        <div class="row justify-content-around">
            <div class="card col-6 col-md-6 col-lg-5 card-primary">
                <div class="card-header mb-2">
                    <h4>Form Detail Keanggotaan Dokter</h4>
                </div>
                <div class="card-body">
                    <span>Dokter ini sudah teregistrasi sebagai anggota PDHI Banten II</span>
                    @foreach($data as $key => $value)
                    <form>
                        <div class="form-group mt-5">
                            <div class="form-group">
                                <label>Domisili Keanggotaan</label>
                                <input readonly type="text" class="form-control" value="{{ $value->domisili_anggota }}">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Terdaftar</label>
                                <input readonly type="text" class="form-control" value="{{ date('d-M-Y', strtotime($value->tanggal_terdaftar)) }}">
                            </div>
                            <div class="form-group">
                                <label>Aktif Hingga</label>
                                <input readonly type="text" class="form-control" value="{{ date('d-M-Y', strtotime($value->masa_aktif)) }}">
                            </div>
                            <div class="form-group">
                                <label>Status Saat Ini</label>
                                @php
                                date_default_timezone_set('Asia/jakarta');
                                $now = new DateTime(date('Y-M-d'));
                                $expired = new DateTime($value->masa_aktif);

                                if ($now > $expired) {
                                $status = '<span class="badge badge-pill badge-danger">Non Aktif</span>';
                                } else {
                                $status = '<span class="badge badge-pill badge-success">Aktif</span>';
                                }
                                @endphp
                                <br>
                                {!! $status !!}
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>

            <div class="card col-6 col-md-6 col-lg-6 card-primary">
                <div class="card-header">
                    <h4>Form Perpanjang & Ubah Domisili Anggota</h4>
                </div>
                <div class="card-body">
                    <span>Form ini diisi jika masa aktif dokter terkait hampir berakhir, status anggota tidak aktif ataupun untuk mengubah domisili. Masa perpanjangan dihitung dari :
                        <br><b> Masa aktif terakhir + Masa aktif perpanjangan </b>
                        <br>(Kolom dengan tanda * wajib diisi)
                    </span><br>
                    <form method="POST" action="{{ url('adminKeanggotaan/' . $value->id) }}">
                        @csrf
                        <div class="form-group mt-n1">
                            <input type="hidden" name="_method" value="PATCH">
                        </div>
                        <div class="form-group">
                            <label>Ubah Domisili</label><span class="text-danger">*</span>
                            <select name="domisili_anggota" class="form-control">
                                <option value="Tetap">Tetap</option>>
                                <option value="Tamu">Tamu</option>>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Masa Perpanjang</label><span class="text-danger">*</span>
                            <select name="masa_aktif" class="form-control">
                                <option value="0">Tidak Ada Perpanjangan</option>>
                                <option value="4">4 Tahun</option>>
                                <option value="2">2 Tahun</option>>
                            </select>
                        </div>
                        <a class="btn btn-primary" href="/adminKeanggotaan" role="button">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection