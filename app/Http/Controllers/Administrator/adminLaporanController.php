<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dokter;
use Illuminate\Support\Facades\Auth;
use App\Exports\dokterExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class adminLaporanController extends Controller
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

        $data = null;
        if ($request->filled('cariDokter')) {
            $data = Dokter::join('Keanggotaan', 'dokter.id_keanggotaan', '=', 'keanggotaan.id')
                ->where('dokter.nama_lengkap', 'LIKE', '%' . $request->cariDokter . '%')
                ->select('dokter.id', 'nama_lengkap', 'username', 'masa_aktif')
                ->paginate(10);
        }

        return view('Administrator.adminLaporan.index', compact('Akun', 'NamaAdmin', 'data'));
    }

    /**
     * Export members or non-members to Excel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('d-m-Y');

        $isAnggota = $request->has('anggota');
        $query = Dokter::join('Pengguna', 'Dokter.username', '=', 'Pengguna.username')
            ->where('id_kelas_pengguna', '1')
            ->join('klinik', 'Dokter.id_klinik', '=', 'klinik.id')
            ->join('Keanggotaan', 'Dokter.id_keanggotaan', '=', 'keanggotaan.id')
            ->select(
                'Pengguna.username', 'Dokter.nama_lengkap', 'Dokter.nama_panggilan',
                'Dokter.tempat_lahir', 'Dokter.tanggal_lahir', 'Dokter.jenis_kelamin',
                'Dokter.alumni', 'Dokter.tahun_alumni', 'Dokter.nama_pasangan',
                'Dokter.alamat_rumah', 'Dokter.no_telp', 'Dokter.email',
                'Dokter.bidang_kerja', 'Klinik.nama_klinik', 'Klinik.alamat_klinik',
                'Klinik.no_telp_klinik', 'Keanggotaan.domisili_anggota',
                'keanggotaan.tanggal_terdaftar', 'keanggotaan.masa_aktif'
            );

        if ($isAnggota) {
            $query->whereNotNull('keanggotaan.tanggal_terdaftar');
            $filename = 'Anggota_PDHI_Banten2_' . $date . '.xlsx';
        } else {
            $query->whereNull('keanggotaan.tanggal_terdaftar');
            $filename = 'Non-Anggota_PDHI_Banten2_' . $date . '.xlsx';
        }

        $records = $query->get();
        return Excel::download(new dokterExport($records), $filename);
    }

    /**
     * Generate PDF report for selected doctor documents.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generatePDF(Request $request)
    {
        $id = $request->id;
        $dataBerkas = DB::table('jenis_berkas_dokter')
            ->leftJoin('berkas_dokter', function ($leftjoin) use ($id) {
                $leftjoin->on('jenis_berkas_dokter.id', '=', 'berkas_dokter.id_jenis_berkas')
                    ->where('berkas_dokter.id_dokter', $id);
            })->get();

        $data = Dokter::where('dokter.id', $id)
            ->join('klinik', 'dokter.id_klinik', '=', 'klinik.id')
            ->get();

        $nama = $data->first()->nama_lengkap ?? 'Dokter';
        $tanggal = date('d-M-Y');

        $pdf = Pdf::loadView('Administrator.adminLaporan.berkas', compact('data', 'tanggal', 'dataBerkas'));
        return $pdf->download('Berkas ' . $nama . '.pdf');
    }
}
