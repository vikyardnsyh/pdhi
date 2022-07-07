<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengguna;
use App\Models\Dokter;
use App\Models\Berkas;
use App\Models\Keanggotaan;
use App\Http\Requests\UpdateAkunRequest;
use App\Http\Requests\StoreAkunRequest;
use App\Models\Klinik;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class adminAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('cariAkun'))
        {
            $Akun = Auth::user()->username;
            $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
            $data = Pengguna::select('Pengguna.*')
            ->join('Dokter', 'dokter.username', '=', 'pengguna.username')
            ->select('pengguna.username','pengguna.status_pengguna','pengguna.id_kelas_pengguna','dokter.nama_lengkap')
            ->where('Pengguna.username','LIKE','%' .$request->cariAkun. '%')
            ->paginate(10);

            return view('Administrator.adminAkun.akun', compact('data','NamaAdmin'));
        }
        else
        {
            $Akun = Auth::user()->username;
            $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
            $data = DB::table('pengguna')
            ->join('dokter', 'pengguna.username', '=', 'dokter.username')
            ->select('pengguna.username','pengguna.status_pengguna','pengguna.id_kelas_pengguna','dokter.nama_lengkap')
            ->orderBy('dokter.nama_lengkap')
            ->paginate(10);
        
            return view('Administrator.adminAkun.akun', compact('data','NamaAdmin'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $Akun = Auth::user()->username;
        $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
        $penggunaBaru = new pengguna;
        return view('Administrator.adminAkun.tambahAkun',compact('penggunaBaru','NamaAdmin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAkunRequest $request)
    {
        $klinikBaru = new Klinik();
        $klinikBaru->save();

        $anggota = new Keanggotaan();
        $anggota->save();

        $penggunaBaru = new Pengguna();
        $penggunaBaru->username = $request->username;
        $penggunaBaru->password = bcrypt($request->password);
        $penggunaBaru->status_pengguna = "1";
        $penggunaBaru->id_kelas_pengguna = $request->id_kelas_pengguna;

        $dokterBaru = new Dokter(); 
        $dokterBaru->id_klinik = $klinikBaru->id;
        $dokterBaru->id_keanggotaan = $anggota->id;
        $dokterBaru->username = $request->username;
        $dokterBaru->nama_lengkap = $request->nama_lengkap;

        $penggunaBaru->save();
        $dokterBaru->save();

        $klinikBaru = new Klinik();
        $klinikBaru->id_dokter = Dokter::where('username', $request->username)->value('id');

        $anggota = new Keanggotaan();
        $anggota->id_dokter = Dokter::where('username', $request->username)->value('id');

        Alert::success('Selesai!', 'Data akun baru sudah ditambahkan');
        return redirect('/AdminAkun');
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
    public function edit($username)
    {
        $Akun = Auth::user()->username;
        $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
        $penggunaBaru = pengguna::find($username);
        $dokterBaru = dokter::where('username', $username)->first();
        if (is_null($dokterBaru)) {
            return abort(404);
        }
        return view('Administrator.adminAkun.editAkun',compact('penggunaBaru','dokterBaru','NamaAdmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAkunRequest $request, $username)
    {
        $penggunaBaru = pengguna::find($username);
        $penggunaBaru->username = $request->username;
        $penggunaBaru->password = bcrypt($request->password);   
        $penggunaBaru->status_pengguna = $request->status_pengguna;
        $penggunaBaru->id_kelas_pengguna = $request->id_kelas_pengguna;

        $penggunaBaru->save();

        $dokterBaru = dokter::where('username', $request->username)->first();
        $dokterBaru->nama_lengkap = $request->nama_lengkap;
        
        $dokterBaru->save();
        Alert::success('Selesai!', 'Data akun yang dipilih sudah diubah');
        return redirect('/AdminAkun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($username)
    {
        $penggunaBaru = Pengguna::find($username);
        $dokterBaru = Dokter::where('username', $username)->first();
        $idDokter = Dokter::where('username', $username)->value('id');
        $idKlinik = Dokter::where('username', $username)->value('id_klinik');
        $klinikBaru = Klinik::where('id', $idKlinik);
        $berkasBaru = Berkas::where('id_dokter', $idDokter);
        $berkasBaru->delete();
        $klinikBaru->delete();
        $dokterBaru->delete();
        $penggunaBaru->delete();
        Alert::success('Selesai!', 'Data akun yang dipilih sudah dihapus');
        return redirect('/AdminAkun');
    }
}
