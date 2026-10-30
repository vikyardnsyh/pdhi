<?php

date_default_timezone_set('Asia/Jakarta');

if (!function_exists('ucapan')) {
    function ucapan()
    {
        $jam = (int)date('H');
        if ($jam < 12) {
            return "Selamat Pagi!";
        } elseif ($jam < 15) {
            return "Selamat Siang!";
        } elseif ($jam < 19) {
            return "Selamat Sore!";
        } else {
            return "Selamat Malam!";
        }
    }
}

if (!function_exists('tanggal')) {
    function tanggal($date = null)
    {
        $hari = [
            'Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu'
        ];
        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $time = $date ? strtotime($date) : time();
        $namaHari = $hari[date('l', $time)] ?? date('l', $time);
        $tgl = date('d', $time);
        $namaBulan = $bulan[(int)date('m', $time)] ?? date('F', $time);
        $tahun = date('Y', $time);

        return "{$namaHari}, {$tgl} {$namaBulan} {$tahun}";
    }
}

if (!function_exists('jam')) {
    function jam()
    {
        return date('H:i');
    }
}
