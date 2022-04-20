<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Pengguna;
use App\Models\Berkas;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class uploadBerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Akun = Auth::user()->username;
        $NamaDokter = Dokter::where('username', $Akun)->value('nama_panggilan');
        $idDokter = Dokter::where('username', $Akun)->value('id');
        $pasFoto = Berkas::where('id_dokter',$idDokter)->where('id_jenis_berkas', '1')->value('nama_berkas');
        $ijazah = Berkas::where('id_dokter',$idDokter)->where('id_jenis_berkas', '2')->value('nama_berkas');
        $ktp = Berkas::where('id_dokter',$idDokter)->where('id_jenis_berkas', '3')->value('nama_berkas');
        $kta = Berkas::where('id_dokter',$idDokter)->where('id_jenis_berkas', '4')->value('nama_berkas');
        $strv = Berkas::where('id_dokter',$idDokter)->where('id_jenis_berkas', '5')->value('nama_berkas');
        $skdhi = Berkas::where('id_dokter',$idDokter)->where('id_jenis_berkas', '6')->value('nama_berkas');
        $tf_daftar = Berkas::where('id_dokter',$idDokter)->where('id_jenis_berkas', '7')->value('nama_berkas');
        $tf_registrasi = Berkas::where('id_dokter',$idDokter)->where('id_jenis_berkas', '8')->value('nama_berkas');
        
        return view('Dokter.uploadBerkas', compact('NamaDokter','pasFoto','ijazah','ktp','kta','strv','skdhi','tf_daftar','tf_registrasi'));
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
        if($request->file('pas_foto')){
            $file = $request->file('pas_foto');
            $namaFile = str_replace("-","",str::uuid()).".jpeg";
            $file->move('img/berkas_dokter',$namaFile);
            $Akun = Auth::user()->username;
            $idDokter = Dokter::where('username', $Akun)->value('id');
            $berkasBaru = new Berkas;
            $berkasBaru->nama_berkas = $namaFile;
            $berkasBaru->id_jenis_berkas = '1';
            $berkasBaru->id_dokter = $idDokter;
            $berkasBaru->save();
            Alert::success('Selesai!', 'Data Berkas Pas Foto Sudah Ditambahkan');
            return redirect('/uploadBerkas');
        }elseif($request->file('ijazah_drh')){
            $file = $request->file('ijazah_drh');
            $namaFile = str_replace("-","",str::uuid()).".jpeg";
            $file->move('img/berkas_dokter',$namaFile);
            $Akun = Auth::user()->username;
            $idDokter = Dokter::where('username', $Akun)->value('id');
            $berkasBaru = new Berkas;
            $berkasBaru->nama_berkas = $namaFile;
            $berkasBaru->id_jenis_berkas = '2';
            $berkasBaru->id_dokter = $idDokter;
            $berkasBaru->save();
            Alert::success('Selesai!', 'Data Berkas Ijazah Sudah Ditambahkan');
            return redirect('/uploadBerkas');
        }elseif($request->file('ktp')){
            $file = $request->file('ktp');
            $namaFile = str_replace("-","",str::uuid()).".jpeg";
            $file->move('img/berkas_dokter',$namaFile);
            $Akun = Auth::user()->username;
            $idDokter = Dokter::where('username', $Akun)->value('id');
            $berkasBaru = new Berkas;
            $berkasBaru->nama_berkas = $namaFile;
            $berkasBaru->id_jenis_berkas = '3';
            $berkasBaru->id_dokter = $idDokter;
            $berkasBaru->save();
            Alert::success('Selesai!', 'Data Berkas KTP Sudah Ditambahkan');
            return redirect('/uploadBerkas');
        }elseif($request->file('kta')){
            $file = $request->file('kta');
            $namaFile = str_replace("-","",str::uuid()).".jpeg";
            $file->move('img/berkas_dokter',$namaFile);
            $Akun = Auth::user()->username;
            $idDokter = Dokter::where('username', $Akun)->value('id');
            $berkasBaru = new Berkas;
            $berkasBaru->nama_berkas = $namaFile;
            $berkasBaru->id_jenis_berkas = '4';
            $berkasBaru->id_dokter = $idDokter;
            $berkasBaru->save();
            Alert::success('Selesai!', 'Data Berkas KTA Sudah Ditambahkan');
            return redirect('/uploadBerkas');
        }elseif($request->file('strv')){
            $file = $request->file('strv');
            $namaFile = str_replace("-","",str::uuid()).".jpeg";
            $file->move('img/berkas_dokter',$namaFile);
            $Akun = Auth::user()->username;
            $idDokter = Dokter::where('username', $Akun)->value('id');
            $berkasBaru = new Berkas;
            $berkasBaru->nama_berkas = $namaFile;
            $berkasBaru->id_jenis_berkas = '5';
            $berkasBaru->id_dokter = $idDokter;
            $berkasBaru->save();
            Alert::success('Selesai!', 'Data Berkas STRV Sudah Ditambahkan');
            return redirect('/uploadBerkas');
        }elseif($request->file('skdhi')){
            $file = $request->file('skdhi');
            $namaFile = str_replace("-","",str::uuid()).".jpeg";
            $file->move('img/berkas_dokter',$namaFile);
            $Akun = Auth::user()->username;
            $idDokter = Dokter::where('username', $Akun)->value('id');
            $berkasBaru = new Berkas;
            $berkasBaru->nama_berkas = $namaFile;
            $berkasBaru->id_jenis_berkas = '6';
            $berkasBaru->id_dokter = $idDokter;
            $berkasBaru->save();
            Alert::success('Selesai!', 'Data Berkas SKDHI Sudah Ditambahkan');
            return redirect('/uploadBerkas');
        }elseif($request->file('tf_daftar')){
            $file = $request->file('tf_daftar');
            $namaFile = str_replace("-","",str::uuid()).".jpeg";
            $file->move('img/berkas_dokter',$namaFile);
            $Akun = Auth::user()->username;
            $idDokter = Dokter::where('username', $Akun)->value('id');
            $berkasBaru = new Berkas;
            $berkasBaru->nama_berkas = $namaFile;
            $berkasBaru->id_jenis_berkas = '7';
            $berkasBaru->id_dokter = $idDokter;
            $berkasBaru->save();
            Alert::success('Selesai!', 'Data Berkas Bukti Transfer Pendaftaran Sudah Ditambahkan');
            return redirect('/uploadBerkas');
        }elseif($request->file('tf_registrasi')){
            $file = $request->file('tf_registrasi');
            $namaFile = str_replace("-","",str::uuid()).".jpeg";
            $file->move('img/berkas_dokter',$namaFile);
            $Akun = Auth::user()->username;
            $idDokter = Dokter::where('username', $Akun)->value('id');
            $berkasBaru = new Berkas;
            $berkasBaru->nama_berkas = $namaFile;
            $berkasBaru->id_jenis_berkas = '8';
            $berkasBaru->id_dokter = $idDokter;
            $berkasBaru->save();
            Alert::success('Selesai!', 'Data Berkas Bukti Transfer Anggota Sudah Ditambahkan');
            return redirect('/uploadBerkas');
        }
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

    // Download Berkas
    public function download(Request $request)
    {
        // $filePath = public_path("dummy.pdf");
    	// $headers = ['Content-Type: application/pdf'];
    	$namaFile = $request->namaFile;
        $pathToFile = public_path('img\\berkas_dokter\\' . $namaFile);
        return response()->download($pathToFile);
    }
}
