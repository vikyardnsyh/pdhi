<?php

namespace App\Http\Controllers;

use App\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dokter;
use App\Models\Pengguna;
use App\Models\Berkas;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Akun = Auth::user()->username;
        $IdKelasPengguna = Auth::user()->id_kelas_pengguna;

        if ($IdKelasPengguna == Constants::ID_KELAS_PENGGUNA_ADMIN) {
            $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
            $totalAnggota = Pengguna::where('id_kelas_pengguna', '1')->count();
            $anggotaTetap = "DUMMY";
            $anggotaTamu = "DUMMY";
            $anggotaAktif = "DUMMY";
            $anggotaNonAktif = "DUMMY";
            $akunAdmin = Pengguna::where('id_kelas_pengguna', '2')->count();
            $akunUser = Pengguna::where('id_kelas_pengguna', '1')->count();
            return view('Administrator.beranda', compact('totalAnggota','anggotaTetap','anggotaTamu','NamaAdmin','anggotaAktif','anggotaNonAktif','akunAdmin','akunUser'));
        } else {
            $Akun = Auth::user()->username;
            $NamaDokter = Dokter::where('username', $Akun)->value('nama_panggilan');
                if(is_null(Dokter::where('username', $Akun)->value('tanggal_lahir'))){
                     $convertTanggal = '-';
                    }else {
                        $tanggalLahir = strtotime(Dokter::where('username', $Akun)->value('tanggal_lahir'));
                        $convertTanggal = date('d M Y', $tanggalLahir);
                        }
            $DataDokter = DB::table('dokter')
            ->join('klinik', 'dokter.id_klinik', '=', 'klinik.id')
            ->where('username',$Akun)
            ->get();
            $idDokter = Dokter::where('username', $Akun)->value('id');
            $pasFoto = Berkas::where('id_dokter',$idDokter)->where('id_jenis_berkas', '1')->value('nama_berkas');
            $idDokter = Dokter::where('username', $Akun)->value('id');
            $ijazah = Berkas::where('id_dokter',$idDokter)->where('id_jenis_berkas', '2')->value('nama_berkas');
            $ktp = Berkas::where('id_dokter',$idDokter)->where('id_jenis_berkas', '3')->value('nama_berkas');
            $kta = Berkas::where('id_dokter',$idDokter)->where('id_jenis_berkas', '4')->value('nama_berkas');
            $strv = Berkas::where('id_dokter',$idDokter)->where('id_jenis_berkas', '5')->value('nama_berkas');
            $skdhi = Berkas::where('id_dokter',$idDokter)->where('id_jenis_berkas', '6')->value('nama_berkas');
            $tf_daftar = Berkas::where('id_dokter',$idDokter)->where('id_jenis_berkas', '7')->value('nama_berkas');
            $tf_registrasi = Berkas::where('id_dokter',$idDokter)->where('id_jenis_berkas', '8')->value('nama_berkas');
            return view('Dokter.index', compact('NamaDokter','DataDokter','convertTanggal','pasFoto','ijazah','ktp','kta','strv','skdhi','tf_daftar','tf_registrasi'));
        }
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
    public function update(Request $request, $id)
    {
        //
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
