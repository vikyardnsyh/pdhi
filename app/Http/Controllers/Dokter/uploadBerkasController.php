<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Berkas;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class uploadBerkasController extends Controller
{
    /**
     * Map form input field names to jenis_berkas_dokter ID and human-readable titles.
     */
    protected $jenisBerkasMapping = [
        'pas_foto'      => ['id' => 1, 'nama' => 'Pas Foto'],
        'ijazah_drh'    => ['id' => 2, 'nama' => 'Ijazah'],
        'ktp'           => ['id' => 3, 'nama' => 'KTP'],
        'kta'           => ['id' => 4, 'nama' => 'KTA'],
        'strv'          => ['id' => 5, 'nama' => 'STRV'],
        'skdhi'         => ['id' => 6, 'nama' => 'SKDHI'],
        'tf_daftar'     => ['id' => 7, 'nama' => 'Bukti Transfer Pendaftaran'],
        'tf_registrasi' => ['id' => 8, 'nama' => 'Bukti Transfer Anggota'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter = Dokter::where('username', Auth::user()->username)->first();
        $NamaDokter = $dokter->nama_panggilan ?? '';
        $idDokter = $dokter->id ?? null;

        $dataBerkas = DB::table('jenis_berkas_dokter')
            ->leftJoin('berkas_dokter', function ($leftjoin) use ($idDokter) {
                $leftjoin->on('jenis_berkas_dokter.id', '=', 'berkas_dokter.id_jenis_berkas')
                    ->where('berkas_dokter.id_dokter', $idDokter);
            })->get();

        return view('Dokter.uploadBerkas', compact('NamaDokter', 'dataBerkas', 'idDokter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dokter = Dokter::where('username', Auth::user()->username)->first();
        if (!$dokter) {
            Alert::error('Gagal', 'Data dokter tidak ditemukan.');
            return redirect('/uploadBerkas');
        }

        return $this->handleFileUpload($request, $dokter->id, 'Ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idDokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idDokter)
    {
        return $this->handleFileUpload($request, $idDokter, 'Diubah');
    }

    /**
     * Common handler for storing or updating uploaded document files.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idDokter
     * @param  string  $actionText
     * @return \Illuminate\Http\Response
     */
    protected function handleFileUpload(Request $request, $idDokter, $actionText = 'Disimpan')
    {
        foreach ($this->jenisBerkasMapping as $field => $info) {
            if ($request->hasFile($field)) {
                $request->validate([
                    $field => ['required', 'file', 'mimes:jpeg,png,jpg,pdf', 'max:6000'],
                ]);

                $file = $request->file($field);
                $ext = strtolower($file->getClientOriginalExtension()) ?: 'jpeg';
                $namaFile = str_replace('-', '', Str::uuid()) . '.' . $ext;

                $destination = public_path('img' . DIRECTORY_SEPARATOR . 'berkas_dokter');
                if (!file_exists($destination)) {
                    mkdir($destination, 0755, true);
                }

                $file->move($destination, $namaFile);

                $berkas = Berkas::firstOrNew([
                    'id_dokter' => $idDokter,
                    'id_jenis_berkas' => (string)$info['id'],
                ]);
                $berkas->nama_berkas = $namaFile;
                $berkas->save();

                Alert::success('Selesai!', "Data Berkas {$info['nama']} Sudah {$actionText}");
                return redirect('/uploadBerkas');
            }
        }

        Alert::error('File Belum Dipilih', 'Mohon upload file yang ada di perangkat anda');
        return redirect('/uploadBerkas');
    }

    /**
     * Secure Download of doctor documents with path traversal protection.
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
            Alert::error('Gagal', 'Berkas tidak ditemukan di server');
            return back();
        }

        return response()->download($pathToFile);
    }
}
