<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Http\Requests\ubahPasswordRequest;
use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Pengguna;
use App\Models\Berkas;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ubahPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = Auth::user()->username;
        $NamaDokter = Dokter::where('username', $username)->value('nama_panggilan');

        return view('Dokter.ubahPassword', compact('NamaDokter', 'username'));
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
    public function update(ubahPasswordRequest $request, $username)
    {
        $passwordDB = Pengguna::where('username', $username)->value('password');
        if (Hash::check($request->password_saat_ini, $passwordDB)) {
            if ($request->password_saat_ini = $request->konfirmasi_password_baru) {
                $passwordBaru = pengguna::find($username);
                $passwordBaru->password = bcrypt($request->password_baru);
                $passwordBaru->save();

                Alert::success('Selesai!', 'Password Sudah Diubah');
                return redirect('/ubahPassword');
            } else {
                return redirect('/ubahPassword');
            }
        } else {
            Alert::error('Ubah Password Gagal!', 'Pastikan Password Lama Anda Sesuai');
            return redirect('/ubahPassword');
        }
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
