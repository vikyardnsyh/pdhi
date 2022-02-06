<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = dokter::all();
        return view('Dokter.index', 
        compact('data')
    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new dokter;
        return view('dokter.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $model = new dokter;
        $model -> nama_lengkap = $request -> nama_lengkap;
        $model -> nama_panggilan = $request -> nama_panggilan;
        $model -> tempat_lahir = $request -> tempat_lahir;
        $model -> tanggal_lahir = $request -> tanggal_lahir;
        $model -> jenis_kelamin = $request -> jenis_kelamin;
        $model -> alumni = $request -> alumni;
        $model -> tahun_alumni = $request -> tahun_alumni;
        $model -> nama_pasangan = $request -> nama_pasangan;
        $model -> alamat_rumah = $request -> alamat_rumah;
        $model -> no_telp = $request -> no_telp;
        $model -> email = $request -> email;
        $model -> bidang_kerja = $request -> bidang_kerja;
        $model -> username = $request -> username;
        $model ->save();

        return redirect('dokter');
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
