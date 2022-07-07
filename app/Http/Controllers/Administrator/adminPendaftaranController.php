<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengguna;
use App\Models\Dokter;
use App\Models\Berkas;
use App\Models\Keanggotaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class adminPendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('cariDokter'))
        {
            $Akun = Auth::user()->username;
            $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');

            $data = DB::table('dokter')
            ->join('pengguna', 'dokter.username', '=', 'pengguna.username')
            ->where('id_kelas_pengguna','1')
            ->leftJoin('berkas_dokter','dokter.id','=','berkas_dokter.id_dokter')
            ->leftJoin('keanggotaan','id_keanggotaan','=','keanggotaan.id')
            ->select('dokter.id','nama_lengkap','nama_panggilan','id_dokter','nama_berkas','tanggal_terdaftar')
            ->where('nama_lengkap','LIKE','%' .$request->cariDokter. '%')
            ->get()
            ->groupBy('nama_lengkap')
            ->paginate(10);
            
            return view('Administrator.adminPendaftaran.index', compact('NamaAdmin','data')); 
        }
        elseif($request->has('terverifikasi'))
        {
            $Akun = Auth::user()->username;
            $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
        
            $data = DB::table('dokter')
            ->join('pengguna', 'dokter.username', '=', 'pengguna.username')
            ->where('id_kelas_pengguna','1')
            ->leftJoin('berkas_dokter','dokter.id','=','berkas_dokter.id_dokter')
            ->leftJoin('keanggotaan','id_keanggotaan','=','keanggotaan.id')
            ->select('dokter.id','nama_lengkap','nama_panggilan','id_dokter','nama_berkas','tanggal_terdaftar')
            ->whereNotNull('tanggal_terdaftar')
            ->get()
            ->groupBy('nama_lengkap')
            ->paginate(10);

            return view('Administrator.adminPendaftaran.index', compact('NamaAdmin','data'));
        }
        elseif($request->has('tinjau'))
        {
            $Akun = Auth::user()->username;
            $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
        
            $data = DB::table('dokter')
            ->join('pengguna', 'dokter.username', '=', 'pengguna.username')
            ->where('id_kelas_pengguna','1')
            ->leftJoin('berkas_dokter','dokter.id','=','berkas_dokter.id_dokter')
            ->leftJoin('keanggotaan','id_keanggotaan','=','keanggotaan.id')
            ->select('dokter.id','nama_lengkap','nama_panggilan','id_dokter','nama_berkas','tanggal_terdaftar')
            ->whereNull('tanggal_terdaftar')
            ->get()
            ->groupBy('nama_lengkap')
            ->paginate(10);

            return view('Administrator.adminPendaftaran.index', compact('NamaAdmin','data'));
        }
        else
        {
            $Akun = Auth::user()->username;
            $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
        
            $data = DB::table('dokter')
            ->join('pengguna', 'dokter.username', '=', 'pengguna.username')
            ->where('id_kelas_pengguna','1')
            ->leftJoin('berkas_dokter','dokter.id','=','berkas_dokter.id_dokter')
            ->leftJoin('keanggotaan','id_keanggotaan','=','keanggotaan.id')
            ->select('dokter.id','nama_lengkap','nama_panggilan','id_dokter','nama_berkas','tanggal_terdaftar')
            ->get()
            ->groupBy('nama_lengkap')
            ->paginate(10);

            return view('Administrator.adminPendaftaran.index', compact('NamaAdmin','data'));
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
        $Akun = Auth::user()->username;
        $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
        $dataDokter = Dokter::where('id',$id)
                    ->get();
        $pasFoto = Berkas::where('id_dokter',$id)->where('id_jenis_berkas', '1')->value('nama_berkas');
        $ijazah = Berkas::where('id_dokter',$id)->where('id_jenis_berkas', '2')->value('nama_berkas');
        $ktp = Berkas::where('id_dokter',$id)->where('id_jenis_berkas', '3')->value('nama_berkas');
        $kta = Berkas::where('id_dokter',$id)->where('id_jenis_berkas', '4')->value('nama_berkas');
        $strv = Berkas::where('id_dokter',$id)->where('id_jenis_berkas', '5')->value('nama_berkas');
        $skdhi = Berkas::where('id_dokter',$id)->where('id_jenis_berkas', '6')->value('nama_berkas');
        $tf_daftar = Berkas::where('id_dokter',$id)->where('id_jenis_berkas', '7')->value('nama_berkas');
        $tf_registrasi = Berkas::where('id_dokter',$id)->where('id_jenis_berkas', '8')->value('nama_berkas');
        
        return view('Administrator.adminPendaftaran.verifikasiPendaftaran', compact('NamaAdmin','dataDokter','pasFoto','ijazah','ktp','kta','strv','skdhi','tf_daftar','tf_registrasi'));

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
        $idKeanggotaan = Dokter::where('id',$id)
                        ->value('id_keanggotaan');
        
        if($request->masa_aktif == '4'){
            $masa_aktif = date('Y-m-d',strtotime('+4 year', strtotime($request->tanggal_terdaftar)));
        }
        else {
            $masa_aktif = date('Y-m-d',strtotime('+2 year', strtotime($request->tanggal_terdaftar)));
        }

        $tanggal_terdaftar = date('Y-m-d', strtotime($request->tanggal_terdaftar));

        $keanggotaanBaru = Keanggotaan::find($idKeanggotaan);
        $keanggotaanBaru->domisili_anggota = $request->domisili_anggota;
        $keanggotaanBaru->tanggal_terdaftar = $tanggal_terdaftar;
        $keanggotaanBaru->masa_aktif = $masa_aktif;
        $keanggotaanBaru->save();

        return redirect('/adminPendaftaran');
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

    // Download Berkas
    public function download(Request $request)
    {
    	$namaFile = $request->namaFile;
        $pathToFile = public_path('img\\berkas_dokter\\' . $namaFile);
        return response()->download($pathToFile);
    }
}
