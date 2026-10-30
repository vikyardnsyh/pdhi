<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormDokterRequest;
use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Klinik;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class formRegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter = Dokter::where('username', Auth::user()->username)->first();
        $NamaDokter = $dokter->nama_panggilan ?? '';
        $DataDokter = $dokter->nama_lengkap ?? '';
        $id = $dokter->id ?? null;

        $data = DB::table('dokter')
            ->where('dokter.id', $id)
            ->join('klinik', 'dokter.id_klinik', '=', 'klinik.id')
            ->join('keanggotaan', 'dokter.id_keanggotaan', '=', 'keanggotaan.id')
            ->get();

        return view('Dokter.formRegistrasi', compact('NamaDokter', 'id', 'DataDokter', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\FormDokterRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormDokterRequest $request, $id)
    {
        $dokterBaru = Dokter::findOrFail($id);
        $dokterBaru->nama_panggilan = $request->nama_panggilan;
        $dokterBaru->tempat_lahir = $request->tempat_lahir;
        if (!empty($request->tanggal_lahir)) {
            $dokterBaru->tanggal_lahir = date('Y-m-d', strtotime($request->tanggal_lahir));
        }
        $dokterBaru->jenis_kelamin = $request->jenis_kelamin;
        $dokterBaru->alumni = $request->alumni;
        $dokterBaru->tahun_alumni = $request->tahun_alumni;
        $dokterBaru->nama_pasangan = $request->nama_pasangan;
        $dokterBaru->alamat_rumah = $request->alamat_rumah;
        $dokterBaru->no_telp = $request->no_telp;
        $dokterBaru->email = $request->email;
        $dokterBaru->bidang_kerja = $request->bidang_kerja;
        $dokterBaru->save();

        if ($dokterBaru->id_klinik) {
            $klinikBaru = Klinik::find($dokterBaru->id_klinik);
            if ($klinikBaru) {
                $klinikBaru->nama_klinik = $request->nama_klinik;
                $klinikBaru->alamat_klinik = $request->alamat_klinik;
                $klinikBaru->no_telp_klinik = $request->no_telp_klinik;
                $klinikBaru->save();
            }
        }

        Alert::success('Selesai!', 'Form Registrasi Telah Tersimpan.');
        return redirect('/');
    }
}
