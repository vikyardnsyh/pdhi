<?php

namespace App\Http\Controllers;

use App\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dokter;
use App\Models\Pengguna;
use App\Models\Berkas;
use App\Models\Keanggotaan;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    /**
     * Display dashboard home depending on user role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $Akun = $user->username;
        $IdKelasPengguna = $user->id_kelas_pengguna;

        if ($IdKelasPengguna == Constants::ID_KELAS_PENGGUNA_ADMIN) {
            date_default_timezone_set('Asia/Jakarta');
            $NamaAdmin = Dokter::where('username', $Akun)->value('nama_lengkap');

            $baseQuery = Pengguna::where('id_kelas_pengguna', '1')
                ->join('dokter', 'pengguna.username', '=', 'dokter.username')
                ->join('keanggotaan', 'dokter.id_keanggotaan', '=', 'keanggotaan.id');

            $totalAnggota = (clone $baseQuery)->whereNotNull('tanggal_terdaftar')->count();
            $totalNonAnggota = (clone $baseQuery)->whereNull('tanggal_terdaftar')->count();

            $today = date('Y-m-d');
            $anggotaTetap = Keanggotaan::where('domisili_anggota', 'tetap')->count();
            $anggotaTamu = Keanggotaan::where('domisili_anggota', 'tamu')->count();
            $anggotaAktif = Keanggotaan::where('masa_aktif', '>', $today)->count();
            $anggotaNonAktif = Keanggotaan::where('masa_aktif', '<', $today)->count();

            $akunAdmin = Pengguna::where('id_kelas_pengguna', '2')->count();
            $akunUser = Pengguna::where('id_kelas_pengguna', '1')->count();

            return view('Administrator.beranda', compact(
                'totalAnggota', 'totalNonAnggota', 'anggotaTetap', 'anggotaTamu',
                'NamaAdmin', 'anggotaAktif', 'anggotaNonAktif', 'akunAdmin', 'akunUser'
            ));
        } else {
            $dokter = Dokter::where('username', $Akun)->first();
            $NamaDokter = $dokter->nama_panggilan ?? '';
            $idDokter = $dokter->id ?? null;

            $DataDokter = DB::table('dokter')
                ->where('dokter.username', $Akun)
                ->join('klinik', 'dokter.id_klinik', '=', 'klinik.id')
                ->join('keanggotaan', 'dokter.id_keanggotaan', '=', 'keanggotaan.id')
                ->get();

            // Fetch all doctor files in a single indexed query instead of 8 separate queries
            $berkasMap = Berkas::where('id_dokter', $idDokter)->pluck('nama_berkas', 'id_jenis_berkas');

            $pasFoto       = $berkasMap['1'] ?? null;
            $ijazah        = $berkasMap['2'] ?? null;
            $ktp           = $berkasMap['3'] ?? null;
            $kta           = $berkasMap['4'] ?? null;
            $strv          = $berkasMap['5'] ?? null;
            $skdhi         = $berkasMap['6'] ?? null;
            $tf_daftar     = $berkasMap['7'] ?? null;
            $tf_registrasi = $berkasMap['8'] ?? null;

            return view('Dokter.index', compact(
                'NamaDokter', 'DataDokter', 'pasFoto', 'ijazah', 'ktp', 'kta',
                'strv', 'skdhi', 'tf_daftar', 'tf_registrasi'
            ));
        }
    }
}
