@extends('layouts.administrator')
@section('title', 'Perpanjang Keanggotaan')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Kelola Keanggotaan</h1>
                <small class="text-muted">Perpanjang masa aktif atau perbarui status domisili dokter</small>
            </div>
        </div>

        @foreach($data as $key => $value)
        <div class="row">
            {{-- Current Status Card --}}
            <div class="col-12 col-lg-6 mb-4">
                <div class="card card-primary shadow-sm h-100">
                    <div class="card-header border-bottom py-3">
                        <h4 class="text-dark font-weight-bold mb-0">
                            <i class="fas fa-info-circle text-primary mr-2"></i> Status Keanggotaan Saat Ini
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="form-group mb-3">
                            <label class="font-weight-600">Domisili Keanggotaan</label>
                            <input readonly type="text" class="form-control bg-light text-capitalize" value="{{ $value->domisili_anggota ?? '-' }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-600">Tanggal Terdaftar</label>
                            <input readonly type="text" class="form-control bg-light" value="{{ !empty($value->tanggal_terdaftar) ? date('d-M-Y', strtotime($value->tanggal_terdaftar)) : '-' }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-600">Aktif Hingga</label>
                            <input readonly type="text" class="form-control bg-light" value="{{ !empty($value->masa_aktif) ? date('d-M-Y', strtotime($value->masa_aktif)) : '-' }}">
                        </div>
                        <div class="form-group mb-0">
                            <label class="font-weight-600 d-block">Status Keaktifan</label>
                            @php
                            date_default_timezone_set('Asia/Jakarta');
                            $now = new DateTime(date('Y-m-d'));
                            $expired = !empty($value->masa_aktif) ? new DateTime($value->masa_aktif) : null;

                            if (is_null($expired)) {
                                $status = '<span class="badge badge-secondary">Belum Diatur</span>';
                            } elseif ($now > $expired) {
                                $status = '<span class="badge badge-danger">Kadaluarsa / Non Aktif</span>';
                            } else {
                                $status = '<span class="badge badge-success">Masih Aktif</span>';
                            }
                            @endphp
                            {!! $status !!}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Extension & Update Form Card --}}
            <div class="col-12 col-lg-6 mb-4">
                <div class="card card-success shadow-sm h-100">
                    <div class="card-header border-bottom py-3">
                        <h4 class="text-success font-weight-bold mb-0">
                            <i class="fas fa-calendar-plus mr-2"></i> Perpanjang / Ubah Domisili
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="alert alert-light border mb-4 text-small">
                            <i class="fas fa-clock mr-1 text-primary"></i> 
                            Masa perpanjangan dihitung otomatis: <strong>Masa aktif terakhir + Periode perpanjangan</strong>.
                        </div>

                        <form method="POST" action="{{ url('adminKeanggotaan/' . $value->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">

                            <div class="form-group mb-3">
                                <label class="font-weight-600">Domisili Keanggotaan <span class="text-danger">*</span></label>
                                <select name="domisili_anggota" class="form-control">
                                    <option value="Tetap" {{ $value->domisili_anggota == 'Tetap' ? 'selected' : '' }}>Anggota Tetap</option>
                                    <option value="Tamu" {{ $value->domisili_anggota == 'Tamu' ? 'selected' : '' }}>Anggota Tamu</option>
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label class="font-weight-600">Tambah Masa Aktif <span class="text-danger">*</span></label>
                                <select name="masa_aktif" class="form-control">
                                    <option value="0">Tidak Ada Perpanjangan (Ubah Domisili Saja)</option>
                                    <option value="4" selected>+ 4 Tahun (Standar Periode PDHI)</option>
                                    <option value="2">+ 2 Tahun</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                <a class="btn btn-outline-secondary" href="{{ url('/adminKeanggotaan') }}">
                                    <i class="fas fa-times mr-1"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save mr-1"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </section>
</div>
@endsection
