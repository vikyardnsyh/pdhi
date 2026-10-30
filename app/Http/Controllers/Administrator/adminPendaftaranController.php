<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dokter;
use App\Models\Keanggotaan;
use App\Http\Requests\pendaftaranDokterRequest;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class adminPendaftaranController extends Controller
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

        $query = DB::table('dokter')
            ->join('pengguna', 'dokter.username', '=', 'pengguna.username')
            ->where('pengguna.id_kelas_pengguna', '1')
            ->leftJoin('berkas_dokter', 'dokter.id', '=', 'berkas_dokter.id_dokter')
            ->leftJoin('keanggotaan', 'dokter.id_keanggotaan', '=', 'keanggotaan.id')
            ->select('dokter.id', 'nama_lengkap', 'nama_panggilan', 'id_dokter', 'nama_berkas', 'tanggal_terdaftar');

        if ($request->filled('cariDokter')) {
            $query->where('nama_lengkap', 'LIKE', '%' . $request->cariDokter . '%');
        } elseif ($request->has('terverifikasi')) {
            $query->whereNotNull('tanggal_terdaftar');
        } elseif ($request->has('tinjau')) {
            $query->whereNull('tanggal_terdaftar');
        }

        $data = $query->get()->groupBy('nama_lengkap')->paginate(10);

        return view('Administrator.adminPendaftaran.index', compact('NamaAdmin', 'data'));
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
        $dataDokter = Dokter::where('dokter.id', $id)
            ->join('keanggotaan', 'dokter.id_keanggotaan', '=', 'keanggotaan.id')
            ->get();

        $dataBerkas = DB::table('jenis_berkas_dokter')->leftJoin('berkas_dokter', function ($leftjoin) use ($id) {
            $leftjoin->on('jenis_berkas_dokter.id', '=', 'berkas_dokter.id_jenis_berkas')
                ->where('berkas_dokter.id_dokter', $id);
        })->get();

        return view('Administrator.adminPendaftaran.verifikasiPendaftaran', compact('NamaAdmin', 'dataDokter', 'dataBerkas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\pendaftaranDokterRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(pendaftaranDokterRequest $request, $id)
    {
        $years = (int)$request->masa_aktif ?: 2;
        $tanggalTerdaftar = date('Y-m-d', strtotime($request->tanggal_terdaftar));
        $masa_aktif = date('Y-m-d', strtotime("+{$years} year", strtotime($tanggalTerdaftar)));

        $keanggotaanBaru = Keanggotaan::findOrFail($id);
        $keanggotaanBaru->domisili_anggota = $request->domisili_anggota;
        $keanggotaanBaru->tanggal_terdaftar = $tanggalTerdaftar;
        $keanggotaanBaru->masa_aktif = $masa_aktif;
        $keanggotaanBaru->save();

        Alert::success('Selesai!', 'Data keanggotaan dokter terkait telah ditambahkan');
        return redirect('/adminPendaftaran');
    }

    /**
     * Download Berkas with path traversal protection.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse|\Illuminate\Http\RedirectResponse
     */
    public function download(Request $request)
    {
        $namaFile = basename($request->namaFile);
        if (empty($namaFile)) {
            abort(400, 'Nama file tidak valid.');
        }

        $pathToFile = public_path('img' . DIRECTORY_SEPARATOR . 'berkas_dokter' . DIRECTORY_SEPARATOR . $namaFile);
        if (!file_exists($pathToFile)) {
            return back()->with('error', 'Berkas tidak ditemukan.');
        }

        return response()->download($pathToFile);
    }
}
