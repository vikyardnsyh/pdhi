<?php
    date_default_timezone_set('Asia/Bangkok');
    setlocale(LC_ALL, 'id-ID', 'id_ID');
    function ucapan() {
        $tanggal = date('d M y h:i');
        $jam = (int)(date("H"));
        if ($jam<12) {
            return "Selamat Pagi!";
        } elseif ($jam<15){
            return "Selamat Siang!";
        } elseif ($jam<19){
            return "Selamat Sore!";
        } else {
            return "Selamat Malam!";
        }
    }
    function tanggal(){
        return strftime("%A, %d %B %Y");
    }
    function jam(){
        return strftime("%H:%M");
    }



