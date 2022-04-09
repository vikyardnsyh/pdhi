<?php

namespace App\Http\Controllers;

use App\Constants;
use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;

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
            $totalAnggota = Dokter::count();
            $anggotaTetap = "DUMMY";
            $anggotaTamu = "DUMMY";
            $anggotaAktif = "DUMMY";
            $anggotaNonAktif = "DUMMY";
            $akunAdmin = Pengguna::where('id_kelas_pengguna', '2')->count();
            $akunUser = Pengguna::where('id_kelas_pengguna', '1')->count();
            return view('Administrator.beranda', compact('totalAnggota','anggotaTetap','anggotaTamu','NamaAdmin','anggotaAktif','anggotaNonAktif','akunAdmin','akunUser'));
        } else {
            $Akun = Auth::user()->username;
            $NamaDokter = Dokter::where('username', $Akun)->value('nama_lengkap');
            return view('Dokter.index', compact('NamaDokter'));
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
