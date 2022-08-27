<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormDokterRequest;
use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Klinik;
use App\Models\Pengguna;
use Illuminate\Support\Facades\DB;
use DateTime;
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
        $Akun = Auth::user()->username;
        $NamaDokter = Dokter::where('username', $Akun)->value('nama_panggilan');
        $DataDokter = Dokter::where('username', $Akun)->value('nama_lengkap');
        $id = Dokter::where('username', $Akun)->value('id');
        $data = DB::table('dokter')
                ->where('dokter.id',$id)
                ->join('klinik', 'dokter.id_klinik', '=', 'klinik.id')
                ->join('keanggotaan','dokter.id_keanggotaan','=','keanggotaan.id')
                ->get();
        return view('Dokter.formRegistrasi', compact('NamaDokter','id','DataDokter','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormDokterRequest $request, $id)
    {
        $dokterBaru = Dokter::find($id);
        $dokterBaru->nama_panggilan = $request->nama_panggilan;
        $dokterBaru->tempat_lahir = $request->tempat_lahir;
        $tanggal = new DateTime($request->tanggal_lahir);
        $formatTanggal = $tanggal->format('Y-m-d');
        $dokterBaru->tanggal_lahir = $formatTanggal;
        $dokterBaru->jenis_kelamin = $request->jenis_kelamin;
        $dokterBaru->alumni = $request->alumni;
        $dokterBaru->tahun_alumni = ($request->tahun_alumni);
        $dokterBaru->nama_pasangan = $request->nama_pasangan;
        $dokterBaru->alamat_rumah = $request->alamat_rumah;
        $dokterBaru->no_telp = $request->no_telp;
        $dokterBaru->email = $request->email;
        $dokterBaru->bidang_kerja = $request->bidang_kerja;
        
        $idKlinik = $dokterBaru->id_klinik;
        $klinikBaru = Klinik::where('id', $idKlinik)->first();
        $klinikBaru->nama_klinik = $request->nama_klinik;
        $klinikBaru->alamat_klinik = $request->alamat_klinik;
        $klinikBaru->no_telp_klinik = $request->no_telp_klinik;

        $klinikBaru->save();
        $dokterBaru->save();
       
        
        
        Alert::success('Selesai!', 'Form Registrasi Telah Tersimpan.');
        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
