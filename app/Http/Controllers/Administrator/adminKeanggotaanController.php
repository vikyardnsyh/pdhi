<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dokter;
use App\Models\Keanggotaan;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class adminKeanggotaanController extends Controller
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
            ->join('keanggotaan', 'dokter.id_keanggotaan', '=', 'keanggotaan.id')
            ->whereNotNull('tanggal_terdaftar');

        if ($request->filled('cariDokter')) {
            $query->where('dokter.nama_lengkap', 'LIKE', '%' . $request->cariDokter . '%');
        }

        if ($request->has('aktif')) {
            $query->where('masa_aktif', '>', date('Y-m-d'));
        } elseif ($request->has('nonaktif')) {
            $query->where('masa_aktif', '<', date('Y-m-d'));
        }

        $data = $query->orderBy('dokter.nama_lengkap')->paginate(10);

        return view('Administrator.adminAnggota.index', compact('data', 'NamaAdmin'));
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
        $data = Keanggotaan::where('id', $id)->get();

        return view('Administrator.adminAnggota.perpanjang', compact('NamaAdmin', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $keanggotaanPerpanjang = Keanggotaan::findOrFail($id);
        $perpanjang = $keanggotaanPerpanjang->masa_aktif ?? date('Y-m-d');

        $years = (int)$request->masa_aktif;
        if ($years > 0) {
            $masa_perpanjang = date('Y-m-d', strtotime("+{$years} year", strtotime($perpanjang)));
        } else {
            $masa_perpanjang = $perpanjang;
        }

        $keanggotaanPerpanjang->domisili_anggota = $request->domisili_anggota;
        $keanggotaanPerpanjang->masa_aktif = $masa_perpanjang;
        $keanggotaanPerpanjang->save();

        Alert::success('Selesai!', 'Data keanggotaan dokter terkait telah disimpan');
        return redirect('/adminKeanggotaan');
    }
}
