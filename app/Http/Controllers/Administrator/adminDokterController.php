<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengguna;
use App\Models\Dokter;
use App\Models\Berkas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class adminDokterController extends Controller
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
            $data = Pengguna::select('Pengguna.*')
            ->join('Dokter', 'dokter.username', '=', 'pengguna.username')
            ->select('pengguna.username','pengguna.status_pengguna','pengguna.id_kelas_pengguna','dokter.nama_lengkap')
            ->where('dokter.nama_lengkap','LIKE','%' .$request->cariDokter. '%')
            ->where('id_kelas_pengguna','1')
            ->join('klinik','dokter.id_klinik','=','klinik.id')
            ->join('keanggotaan','dokter.id_keanggotaan','=','keanggotaan.id')
            ->select('dokter.id','nama_lengkap','nama_panggilan','tempat_lahir','tanggal_lahir','jenis_kelamin','alumni','tahun_alumni','nama_pasangan','alamat_rumah','no_telp','email','bidang_kerja','nama_klinik','alamat_klinik','no_telp_klinik','domisili_anggota','tanggal_terdaftar','masa_aktif')
            ->paginate(10);

            return view('Administrator.adminDokter.index', compact('data','NamaAdmin'));
        }
        elseif($request->has('terdaftar'))
        {
            $Akun = Auth::user()->username;
            $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
            $data = DB::table('dokter')
                    ->join('pengguna', 'dokter.username', '=', 'pengguna.username')
                    ->where('id_kelas_pengguna','1')
                    ->join('klinik','dokter.id_klinik','=','klinik.id')
                    ->join('keanggotaan','dokter.id_keanggotaan','=','keanggotaan.id')
                    ->whereNotNull('tanggal_terdaftar')
                    ->orderBy('dokter.nama_lengkap')
                    ->select('dokter.id','nama_lengkap','nama_panggilan','tempat_lahir','tanggal_lahir','jenis_kelamin','alumni','tahun_alumni','nama_pasangan','alamat_rumah','no_telp','email','bidang_kerja','nama_klinik','alamat_klinik','no_telp_klinik','domisili_anggota','tanggal_terdaftar','masa_aktif')
                    ->paginate(10);
                    
            
            return view('Administrator.adminDokter.index', compact('data','NamaAdmin'));
        }
        elseif($request->has('belumterdaftar'))
        {
            $Akun = Auth::user()->username;
            $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
            $data = DB::table('dokter')
                    ->join('pengguna', 'dokter.username', '=', 'pengguna.username')
                    ->where('id_kelas_pengguna','1')
                    ->join('klinik','dokter.id_klinik','=','klinik.id')
                    ->join('keanggotaan','dokter.id_keanggotaan','=','keanggotaan.id')
                    ->whereNull('tanggal_terdaftar')
                    ->orderBy('dokter.nama_lengkap')
                    ->select('dokter.id','nama_lengkap','nama_panggilan','tempat_lahir','tanggal_lahir','jenis_kelamin','alumni','tahun_alumni','nama_pasangan','alamat_rumah','no_telp','email','bidang_kerja','nama_klinik','alamat_klinik','no_telp_klinik','domisili_anggota','tanggal_terdaftar','masa_aktif')
                    ->paginate(10);
            
            return view('Administrator.adminDokter.index', compact('data','NamaAdmin'));
        }
        else
        {
            $Akun = Auth::user()->username;
            $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
            $data = DB::table('pengguna')
                    ->join('dokter', 'pengguna.username', '=', 'dokter.username')
                    ->where('id_kelas_pengguna','1')
                    ->join('klinik','dokter.id_klinik','=','klinik.id')
                    ->join('keanggotaan','dokter.id_keanggotaan','=','keanggotaan.id')
                    ->orderBy('dokter.nama_lengkap')
                    ->select('dokter.id','nama_lengkap','nama_panggilan','tempat_lahir','tanggal_lahir','jenis_kelamin','alumni','tahun_alumni','nama_pasangan','alamat_rumah','no_telp','email','bidang_kerja','nama_klinik','alamat_klinik','no_telp_klinik','domisili_anggota','tanggal_terdaftar','masa_aktif')
                    ->paginate(10);
            
            return view('Administrator.adminDokter.index', compact('data','NamaAdmin'));
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

        $DataDokter = DB::table('dokter')
        ->where('dokter.id',$id)
        ->join('klinik', 'dokter.id_klinik', '=', 'klinik.id')
        ->join('keanggotaan','dokter.id_keanggotaan','=','keanggotaan.id')
        ->get();

        $pasFoto = Berkas::where('id_dokter',$id)->where('id_jenis_berkas', '1')->value('nama_berkas');
        
        return view('Administrator.adminDokter.detailDokter',compact('NamaAdmin','DataDokter','pasFoto'));
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
