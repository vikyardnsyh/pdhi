<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Pengguna;
use App\Models\Dokter;
use App\Models\Klinik;
use App\Models\Keanggotaan;
use App\Models\Berkas;
use App\Http\Requests\StoreAkunRequest;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class adminAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Akun = Auth::user()->username;
        $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');

        $query = DB::table('pengguna')
            ->join('dokter', 'pengguna.username', '=', 'dokter.username')
            ->select('pengguna.username', 'pengguna.status_pengguna', 'pengguna.id_kelas_pengguna', 'dokter.nama_lengkap');

        if ($request->filled('cariAkun')) {
            $query->where('pengguna.username', 'LIKE', '%' . $request->cariAkun . '%');
        } elseif ($request->has('admin')) {
            $query->where('pengguna.id_kelas_pengguna', '2');
        } elseif ($request->has('user')) {
            $query->where('pengguna.id_kelas_pengguna', '1');
        }

        $data = $query->orderBy('dokter.nama_lengkap')->paginate(10);

        return view('Administrator.adminAkun.akun', compact('data', 'NamaAdmin'));
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
        $penggunaBaru = new Pengguna();
        return view('Administrator.adminAkun.tambahAkun', compact('penggunaBaru', 'NamaAdmin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAkunRequest  $request
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
        $penggunaBaru->status_pengguna = '1';
        $penggunaBaru->id_kelas_pengguna = $request->id_kelas_pengguna;
        $penggunaBaru->save();

        $dokterBaru = new Dokter();
        $dokterBaru->id_klinik = $klinikBaru->id;
        $dokterBaru->id_keanggotaan = $anggota->id;
        $dokterBaru->username = $request->username;
        $dokterBaru->nama_lengkap = $request->nama_lengkap;
        $dokterBaru->save();

        Alert::success('Selesai!', 'Data akun baru sudah ditambahkan');
        return redirect('/AdminAkun')->with('refresh', true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $Akun = Auth::user()->username;
        $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
        $penggunaBaru = Pengguna::findOrFail($username);
        $dokterBaru = Dokter::where('username', $username)->first();

        if (is_null($dokterBaru)) {
            abort(404);
        }

        return view('Administrator.adminAkun.editAkun', compact('penggunaBaru', 'dokterBaru', 'NamaAdmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                Rule::unique('pengguna', 'username')->ignore($username, 'username'),
            ],
            'status_pengguna' => 'required',
            'id_kelas_pengguna' => 'required',
        ]);

        $penggunaBaru = Pengguna::findOrFail($username);
        $targetUsername = $request->username;

        if ($username !== $targetUsername) {
            $penggunaBaru->username = $targetUsername;
        }
        $penggunaBaru->status_pengguna = $request->status_pengguna;
        $penggunaBaru->id_kelas_pengguna = $request->id_kelas_pengguna;
        $penggunaBaru->save();

        $dokterBaru = Dokter::where('username', $username)->orWhere('username', $targetUsername)->first();
        if ($dokterBaru) {
            $dokterBaru->username = $targetUsername;
            $dokterBaru->nama_lengkap = $request->nama_lengkap;
            $dokterBaru->save();
        }

        Alert::success('Selesai!', 'Data akun yang dipilih sudah diubah');
        return redirect('/AdminAkun')->with('refresh', true);
    }

    /**
     * Reset password for selected account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resetPassword(Request $request)
    {
        $passwordBaru = Pengguna::findOrFail($request->username);
        $passwordBaru->password = bcrypt('PdhiBanten2!');
        $passwordBaru->save();

        Alert::success('Selesai!', 'Password akun yang dipilih telah diubah');
        return redirect('/AdminAkun')->with('refresh', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function destroy($username)
    {
        $penggunaBaru = Pengguna::find($username);
        $dokterBaru = Dokter::where('username', $username)->first();

        if ($dokterBaru) {
            $idDokter = $dokterBaru->id;
            $idKlinik = $dokterBaru->id_klinik;
            $idKeanggotaan = $dokterBaru->id_keanggotaan;

            Berkas::where('id_dokter', $idDokter)->delete();
            $dokterBaru->delete();

            if ($idKeanggotaan) {
                Keanggotaan::where('id', $idKeanggotaan)->delete();
            }
            if ($idKlinik) {
                Klinik::where('id', $idKlinik)->delete();
            }
        }

        if ($penggunaBaru) {
            $penggunaBaru->delete();
        }

        Alert::success('Selesai!', 'Data akun yang dipilih sudah dihapus');
        return redirect('/AdminAkun')->with('refresh', true);
    }
}
