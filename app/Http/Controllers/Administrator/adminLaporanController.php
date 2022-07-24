<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengguna;
use App\Models\Dokter;
use App\Models\jenisBerkas;
use App\Models\Keanggotaan;
use App\Models\Berkas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\dokterExport;
use Hamcrest\Core\IsNot;
use DateTime;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class adminLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cariDokter')) {
            $Akun = Auth::user()->username;
            $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
            $data = Dokter::select('Dokter.*')
                ->join('Keanggotaan', 'dokter.id_keanggotaan', '=', 'keanggotaan.id')
                ->where('Dokter.nama_lengkap', 'LIKE', '%' . $request->cariDokter . '%')
                ->select('dokter.id', 'nama_lengkap', 'username', 'masa_aktif')
                ->paginate(10);
            return view('Administrator.adminLaporan.index', compact('Akun', 'NamaAdmin', 'data'));
        } else {
            $Akun = Auth::user()->username;
            $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');
            $data = null;

            return view('Administrator.adminLaporan.index', compact('Akun', 'NamaAdmin', 'data'));
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

    public function export(Request $request)
    {
        date_default_timezone_set('Asia/jakarta');
        $date = date('d-m-Y', strtotime("now"));


        if ($request->has('anggota')) {
            $anggota = Dokter::select('Pengguna.username', 'Dokter.nama_lengkap', 'Dokter.nama_panggilan', 'Dokter.tempat_lahir', 'Dokter.tanggal_lahir', 'Dokter.jenis_kelamin', 'Dokter.alumni', 'Dokter.tahun_alumni', 'Dokter.nama_pasangan', 'Dokter.alamat_rumah', 'Dokter.no_telp', 'Dokter.email', 'Dokter.bidang_kerja', 'Klinik.nama_klinik', 'Klinik.alamat_klinik', 'Klinik.no_telp_klinik', 'Keanggotaan.domisili_anggota', 'keanggotaan.tanggal_terdaftar', 'keanggotaan.masa_aktif')->join('Pengguna', 'Dokter.username', '=', 'Pengguna.username')->where('id_kelas_pengguna', '1')->join('klinik', 'Dokter.id_klinik', '=', 'klinik.id')->join('Keanggotaan', 'Dokter.id_keanggotaan', '=', 'keanggotaan.id')->whereNotNull('keanggotaan.tanggal_terdaftar')->get();
            return Excel::download(new dokterExport($anggota), 'Anggota_PDHI_Banten2_' . $date . '.xlsx');
        } else {
            $anggota = Dokter::select('Pengguna.username', 'Dokter.nama_lengkap', 'Dokter.nama_panggilan', 'Dokter.tempat_lahir', 'Dokter.tanggal_lahir', 'Dokter.jenis_kelamin', 'Dokter.alumni', 'Dokter.tahun_alumni', 'Dokter.nama_pasangan', 'Dokter.alamat_rumah', 'Dokter.no_telp', 'Dokter.email', 'Dokter.bidang_kerja', 'Klinik.nama_klinik', 'Klinik.alamat_klinik', 'Klinik.no_telp_klinik', 'Keanggotaan.domisili_anggota', 'keanggotaan.tanggal_terdaftar', 'keanggotaan.masa_aktif')->join('Pengguna', 'Dokter.username', '=', 'Pengguna.username')->where('id_kelas_pengguna', '1')->join('klinik', 'Dokter.id_klinik', '=', 'klinik.id')->join('Keanggotaan', 'Dokter.id_keanggotaan', '=', 'keanggotaan.id')->whereNull('keanggotaan.tanggal_terdaftar')->get();
            return Excel::download(new dokterExport($anggota), 'Anggota_PDHI_Banten2_' . $date . '.xlsx');
        }
    }

    public function generatePDF(Request $request)
    {
        $id = $request->id;
        $dataBerkas = DB::table('jenis_berkas_dokter')->leftJoin('berkas_dokter', function ($leftjoin) use ($id) {
            $leftjoin->on('jenis_berkas_dokter.id', '=', 'berkas_dokter.id_jenis_berkas')
                ->where('berkas_dokter.id_dokter', $id);
        })->get();

        $data = Dokter::where('dokter.id', $id)->join('klinik', 'dokter.id_klinik', '=', 'klinik.id')->get();
        $nama = Dokter::where('dokter.id', $id)->value('nama_lengkap');
        $now = new DateTime(date('Y-M-d'));
        $tanggal = $now->format('d-M-Y');
        $pdf = Pdf::loadview('Administrator.adminLaporan.berkas', compact('data', 'tanggal', 'dataBerkas'));
        return $pdf->download('Berkas '.$nama. '.pdf');
    }
}
