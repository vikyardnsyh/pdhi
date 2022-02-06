<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Pengguna::all();

        $data = Pengguna::join('kelas_pengguna', 'kelas_pengguna.id', '=', 'pengguna.id_kelas_pengguna')
            ->select(
                'pengguna.*',
                'kelas_pengguna.nama as nama_kelas_pengguna'
            )
            ->get();
            
        return view('Pengguna.index', compact('data')
    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new pengguna;
        return view('pengguna.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new pengguna;
        $model -> username = $request -> username;
        $model -> password = $request -> password;
        $model -> status_pengguna = $request -> status_pengguna;
        $model -> id_kelas_pengguna = $request -> id_kelas_pengguna;
        $model ->save();

        return redirect('pengguna');

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
        $model = pengguna::find($username);
        return view('pengguna.edit', compact('model'));
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
        $model = pengguna::find($username);
        $model -> username = $request -> username;
        $model -> password = $request -> password;
        $model -> status_pengguna = $request -> status_pengguna;
        $model -> id_kelas_pengguna = $request -> id_kelas_pengguna;
        $model ->save();

        return redirect('pengguna');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($username)
    {
        $model = pengguna::find($username);
        $model->delete();
        return redirect('pengguna');
    }
}
