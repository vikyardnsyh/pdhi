<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengguna;
use App\Models\Dokter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class adminAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Akun = Auth::user()->username;
        $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
        $data = DB::table('pengguna')
                ->join('dokter', 'pengguna.username', '=', 'dokter.username')
                ->select('pengguna.username','pengguna.status_pengguna','pengguna.id_kelas_pengguna','dokter.nama_lengkap')
                ->orderBy('dokter.nama_lengkap')->get();
            
        return view('Administrator.adminAkun.akun', compact('data','NamaAdmin'));
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
    public function store(Request $request)
    {
        $penggunaBaru = new pengguna;
        $penggunaBaru->username = $request->username;
        $penggunaBaru->password = bcrypt($request->password);
        $penggunaBaru->status_pengguna = "1";
        $penggunaBaru->id_kelas_pengguna = $request->id_kelas_pengguna;

        $dokterBaru = new dokter;
        $dokterBaru->username = $request->username;
        $dokterBaru->nama_lengkap = $request->nama_lengkap;

        $penggunaBaru->save();
        $dokterBaru->save();

        return redirect('/AdminAkun')->with('success', "Akun berhasil ditambahkan");
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
    public function update(Request $request, $username)
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
        
        return redirect('/AdminAkun')->with('success', "Akun berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($username)
    {
        $penggunaBaru = pengguna::find($username);
        $dokterBaru = dokter::where('username', $username)->first();
        $dokterBaru->delete();
        $penggunaBaru->delete();

        return redirect('/AdminAkun')->with('success', "Akun berhasil dihapus");
    }
}
