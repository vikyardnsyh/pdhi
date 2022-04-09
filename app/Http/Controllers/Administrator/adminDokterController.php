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
            ->get();
            
            return view('Administrator.adminDokter.index', compact('data','NamaAdmin'));
        }
        else
        {
            $Akun = Auth::user()->username;
            $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
            $data = DB::table('dokter')
                    ->join('pengguna', 'dokter.username', '=', 'pengguna.username')
                    ->orderBy('dokter.nama_lengkap')
                    ->get();
                
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
