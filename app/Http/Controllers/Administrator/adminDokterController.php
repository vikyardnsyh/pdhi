<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengguna;
use App\Models\Dokter;
use App\Models\Berkas;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class adminDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Akun = Auth::user()->username;
        $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');

        $query = DB::table('dokter')
            ->join('pengguna', 'dokter.username', '=', 'pengguna.username')
            ->where('pengguna.id_kelas_pengguna', '1')
            ->join('klinik', 'dokter.id_klinik', '=', 'klinik.id')
            ->join('keanggotaan', 'dokter.id_keanggotaan', '=', 'keanggotaan.id')
            ->select(
                'dokter.id', 'nama_lengkap', 'nama_panggilan', 'tempat_lahir',
                'tanggal_lahir', 'jenis_kelamin', 'alumni', 'tahun_alumni',
                'nama_pasangan', 'alamat_rumah', 'no_telp', 'email',
                'bidang_kerja', 'nama_klinik', 'alamat_klinik',
                'no_telp_klinik', 'domisili_anggota', 'tanggal_terdaftar', 'masa_aktif'
            );

        if ($request->filled('cariDokter')) {
            $query->where('dokter.nama_lengkap', 'LIKE', '%' . $request->cariDokter . '%');
        } elseif ($request->has('terdaftar')) {
            $query->whereNotNull('tanggal_terdaftar');
        } elseif ($request->has('belumterdaftar')) {
            $query->whereNull('tanggal_terdaftar');
        }

        $data = $query->orderBy('dokter.nama_lengkap')->paginate(10);

        return view('Administrator.adminDokter.index', compact('data', 'NamaAdmin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Akun = Auth::user()->username;
        $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');

        $DataDokter = DB::table('dokter')
            ->where('dokter.id', $id)
            ->join('klinik', 'dokter.id_klinik', '=', 'klinik.id')
            ->join('keanggotaan', 'dokter.id_keanggotaan', '=', 'keanggotaan.id')
            ->get();

        $pasFoto = Berkas::where('id_dokter', $id)->where('id_jenis_berkas', '1')->value('nama_berkas');

        return view('Administrator.adminDokter.detailDokter', compact('NamaAdmin', 'DataDokter', 'pasFoto'));
    }
}
