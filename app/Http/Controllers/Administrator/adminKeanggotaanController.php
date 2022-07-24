<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengguna;
use App\Models\Dokter;
use App\Models\Keanggotaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class adminKeanggotaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cariDokter')) {
            $Akun = Auth::user()->username;
            $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
            $data = DB::table('dokter')
                ->join('pengguna', 'dokter.username', '=', 'pengguna.username')
                ->where('id_kelas_pengguna', '1')
                ->join('keanggotaan', 'dokter.id_keanggotaan', '=', 'keanggotaan.id')
                ->whereNotNull('tanggal_terdaftar')
                ->where('dokter.nama_lengkap', 'LIKE', '%' . $request->cariDokter . '%')
                ->orderBy('dokter.nama_lengkap')
                ->paginate(10);

            return view('Administrator.adminAnggota.index', compact('data', 'NamaAdmin'));
        } elseif ($request->has('aktif')) {
            $Akun = Auth::user()->username;
            $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
            $data = DB::table('dokter')
                ->join('pengguna', 'dokter.username', '=', 'pengguna.username')
                ->where('id_kelas_pengguna', '1')
                ->join('keanggotaan', 'dokter.id_keanggotaan', '=', 'keanggotaan.id')
                ->whereNotNull('tanggal_terdaftar')
                ->where('dokter.nama_lengkap', 'LIKE', '%' . $request->cariDokter . '%')
                ->where('masa_aktif', '>', date('Y-m-d'))
                ->orderBy('dokter.nama_lengkap')
                ->paginate(10);

            return view('Administrator.adminAnggota.index', compact('data', 'NamaAdmin'));
        } elseif ($request->has('nonaktif')) {
            date_default_timezone_set('Asia/jakarta');
            $Akun = Auth::user()->username;
            $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
            $data = DB::table('dokter')
                ->join('pengguna', 'dokter.username', '=', 'pengguna.username')
                ->where('id_kelas_pengguna', '1')
                ->join('keanggotaan', 'dokter.id_keanggotaan', '=', 'keanggotaan.id')
                ->whereNotNull('tanggal_terdaftar')
                ->where('dokter.nama_lengkap', 'LIKE', '%' . $request->cariDokter . '%')
                ->where('masa_aktif', '<', date('Y-m-d'))
                ->orderBy('dokter.nama_lengkap')
                ->paginate(10);

            return view('Administrator.adminAnggota.index', compact('data', 'NamaAdmin'));
        } else {
            $Akun = Auth::user()->username;
            $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
            $data = DB::table('dokter')
                ->join('pengguna', 'dokter.username', '=', 'pengguna.username')
                ->where('id_kelas_pengguna', '1')
                ->join('keanggotaan', 'dokter.id_keanggotaan', '=', 'keanggotaan.id')
                ->whereNotNull('tanggal_terdaftar')
                ->orderBy('dokter.nama_lengkap')
                ->paginate(10);

            return view('Administrator.adminAnggota.index', compact('data', 'NamaAdmin'));
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
        $perpanjang = Keanggotaan::where('id',$id)
                            ->value('masa_aktif');
        
        if($request->masa_aktif == '4'){
            $masa_perpanjang = date('Y-m-d',strtotime('+4 year', strtotime($perpanjang)));
        }
        elseif($request->masa_aktif == '2'){
            $masa_perpanjang = date('Y-m-d',strtotime('+2 year', strtotime($perpanjang)));
        }
        else{
            $masa_perpanjang = $perpanjang;
        }

        $keanggotaanPerpanjang = Keanggotaan::find($id);
        $keanggotaanPerpanjang->domisili_anggota = $request->domisili_anggota;
        $keanggotaanPerpanjang->masa_aktif = $masa_perpanjang;
        $keanggotaanPerpanjang->save();
        Alert::success('Selesai!', 'Data keanggotaan dokter terkait telah disimpan');
        return redirect('/adminKeanggotaan');
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
