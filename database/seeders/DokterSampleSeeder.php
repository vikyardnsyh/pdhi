<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DokterSampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dummyFile = 'sample_berkas.jpg';
        $defaultPassword = Hash::make('PdhiBanten2!');

        $samples = [
            // 1. Anggota Tetap - Aktif - Berkas Lengkap
            [
                'username' => 'ahmadfauzi',
                'status_pengguna' => 1,
                'nama_lengkap' => 'Drh. Ahmad Fauzi',
                'nama_panggilan' => 'Ahmad',
                'tempat_lahir' => 'Tangerang',
                'tanggal_lahir' => '1990-05-14',
                'jenis_kelamin' => 'Laki-Laki',
                'alumni' => 'Institut Pertanian Bogor',
                'tahun_alumni' => '2015',
                'nama_pasangan' => 'Nurul Hidayah',
                'alamat_rumah' => 'Jl. Boulevard Bintaro Jaya No. 12, Pondok Aren, Tangerang Selatan',
                'no_telp' => '081234567801',
                'email' => 'ahmad.fauzi@example.com',
                'bidang_kerja' => 'Praktek Dokter Hewan Mandiri',
                'nama_klinik' => 'Klinik Hewan Sejahtera Bintaro',
                'alamat_klinik' => 'Ruko Sentra Niaga Blok B No. 5, Pondok Aren, Tangsel',
                'no_telp_klinik' => '0217451234',
                'domisili_anggota' => 'Tetap',
                'tanggal_terdaftar' => '2023-08-15',
                'masa_aktif' => '2027-08-15',
                'berkas' => [1, 2, 3, 4, 5, 6, 7, 8],
            ],

            // 2. Anggota Tetap - Aktif - Berkas Lengkap
            [
                'username' => 'sitinurhaliza',
                'status_pengguna' => 1,
                'nama_lengkap' => 'Drh. Siti Nurhaliza',
                'nama_panggilan' => 'Siti',
                'tempat_lahir' => 'Serang',
                'tanggal_lahir' => '1993-02-18',
                'jenis_kelamin' => 'Perempuan',
                'alumni' => 'Universitas Gadjah Mada',
                'tahun_alumni' => '2017',
                'nama_pasangan' => 'Rian Hidayat',
                'alamat_rumah' => 'Komplek Ciceri Indah Blok C No. 4, Serang, Banten',
                'no_telp' => '081234567802',
                'email' => 'siti.nurhaliza@example.com',
                'bidang_kerja' => 'Klinik Hewan Kesayangan',
                'nama_klinik' => 'Serang Pet Clinic & Care',
                'alamat_klinik' => 'Jl. Veteran No. 88, Kota Serang',
                'no_telp_klinik' => '0254201999',
                'domisili_anggota' => 'Tetap',
                'tanggal_terdaftar' => '2024-01-20',
                'masa_aktif' => '2028-01-20',
                'berkas' => [1, 2, 3, 4, 5, 6, 7, 8],
            ],

            // 3. Anggota Tetap - Aktif - Berkas Lengkap
            [
                'username' => 'baguswicaksono',
                'status_pengguna' => 1,
                'nama_lengkap' => 'Drh. Bagus Wicaksono',
                'nama_panggilan' => 'Bagus',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1988-11-03',
                'jenis_kelamin' => 'Laki-Laki',
                'alumni' => 'Universitas Airlangga',
                'tahun_alumni' => '2012',
                'nama_pasangan' => 'Dwi Astuti',
                'alamat_rumah' => 'Jl. Pahlawan Seribu Blok F No. 2, BSD City, Tangerang Selatan',
                'no_telp' => '081234567803',
                'email' => 'bagus.wicaksono@example.com',
                'bidang_kerja' => 'Rumah Sakit Hewan',
                'nama_klinik' => 'BSD Animal Medical Center',
                'alamat_klinik' => 'Jl. BSD Grand Boulevard No. 10, Serpong, Tangsel',
                'no_telp_klinik' => '0215312345',
                'domisili_anggota' => 'Tetap',
                'tanggal_terdaftar' => '2022-12-10',
                'masa_aktif' => '2026-12-10',
                'berkas' => [1, 2, 3, 4, 5, 6, 7, 8],
            ],

            // 4. Anggota Tetap - Masa Aktif Habis (Nonaktif Keanggotaan)
            [
                'username' => 'mayaanggraini',
                'status_pengguna' => 1,
                'nama_lengkap' => 'Drh. Maya Anggraini',
                'nama_panggilan' => 'Maya',
                'tempat_lahir' => 'Pandeglang',
                'tanggal_lahir' => '1987-07-22',
                'jenis_kelamin' => 'Perempuan',
                'alumni' => 'Institut Pertanian Bogor',
                'tahun_alumni' => '2011',
                'nama_pasangan' => 'Agus Priyono',
                'alamat_rumah' => 'Jl. Raya Labuan KM 4, Saruni, Pandeglang',
                'no_telp' => '081234567804',
                'email' => 'maya.anggraini@example.com',
                'bidang_kerja' => 'Praktek Mandiri & Ternak',
                'nama_klinik' => 'Klinik Hewan Berkah Pandeglang',
                'alamat_klinik' => 'Jl. Ahmad Yani No. 15, Pandeglang',
                'no_telp_klinik' => '0253201112',
                'domisili_anggota' => 'Tetap',
                'tanggal_terdaftar' => '2020-03-01',
                'masa_aktif' => '2024-03-01', // Expired
                'berkas' => [1, 2, 3, 4, 5, 6, 7, 8],
            ],

            // 5. Anggota Tetap - Masa Aktif Habis (Nonaktif Keanggotaan)
            [
                'username' => 'hendrakurniawan',
                'status_pengguna' => 1,
                'nama_lengkap' => 'Drh. Hendra Kurniawan',
                'nama_panggilan' => 'Hendra',
                'tempat_lahir' => 'Cilegon',
                'tanggal_lahir' => '1986-09-12',
                'jenis_kelamin' => 'Laki-Laki',
                'alumni' => 'Universitas Brawijaya',
                'tahun_alumni' => '2010',
                'nama_pasangan' => 'Rini Susanti',
                'alamat_rumah' => 'Perum Krakatau Steel Blok D No. 8, Cilegon',
                'no_telp' => '081234567805',
                'email' => 'hendra.kurniawan@example.com',
                'bidang_kerja' => 'Industri Pakan Ternak & Praktek',
                'nama_klinik' => 'Cilegon Animal Health Centre',
                'alamat_klinik' => 'Jl. Sultan Ageng Tirtayasa No. 42, Cilegon',
                'no_telp_klinik' => '0254391234',
                'domisili_anggota' => 'Tetap',
                'tanggal_terdaftar' => '2019-11-20',
                'masa_aktif' => '2023-11-20', // Expired
                'berkas' => [1, 2, 3, 4, 5, 6, 7, 8],
            ],

            // 6. Anggota Tamu - Aktif - Berkas Lengkap
            [
                'username' => 'rinawulandari',
                'status_pengguna' => 1,
                'nama_lengkap' => 'Drh. Rina Wulandari',
                'nama_panggilan' => 'Rina',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1991-04-29',
                'jenis_kelamin' => 'Perempuan',
                'alumni' => 'Universitas Padjadjaran',
                'tahun_alumni' => '2016',
                'nama_pasangan' => 'Doni Kusuma',
                'alamat_rumah' => 'Jl. Alam Sutera Utama No. 18, Pinang, Kota Tangerang',
                'no_telp' => '081234567806',
                'email' => 'rina.wulandari@example.com',
                'bidang_kerja' => 'Klinik Hewan Kesayangan',
                'nama_klinik' => 'Alam Sutera Veterinary Clinic',
                'alamat_klinik' => 'Ruko Sutera Niaga 1 No. 3, Alam Sutera',
                'no_telp_klinik' => '0212900123',
                'domisili_anggota' => 'Tamu',
                'tanggal_terdaftar' => '2023-05-18',
                'masa_aktif' => '2027-05-18',
                'berkas' => [1, 2, 3, 4, 5, 6, 7, 8],
            ],

            // 7. Anggota Tamu - Aktif - Berkas Lengkap
            [
                'username' => 'dimasprasetyo',
                'status_pengguna' => 1,
                'nama_lengkap' => 'Drh. Dimas Prasetyo',
                'nama_panggilan' => 'Dimas',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '1992-12-08',
                'jenis_kelamin' => 'Laki-Laki',
                'alumni' => 'Universitas Gadjah Mada',
                'tahun_alumni' => '2016',
                'nama_pasangan' => 'Lestari Handayani',
                'alamat_rumah' => 'Jl. Boulevard Gading Serpong Kav. 22, Kelapa Dua, Tangerang',
                'no_telp' => '081234567807',
                'email' => 'dimas.prasetyo@example.com',
                'bidang_kerja' => 'Praktek Dokter Hewan Bersama',
                'nama_klinik' => 'Gading Serpong Pet Wellness',
                'alamat_klinik' => 'Ruko Fluorite Blok FR No. 12, Gading Serpong',
                'no_telp_klinik' => '0215420112',
                'domisili_anggota' => 'Tamu',
                'tanggal_terdaftar' => '2024-06-30',
                'masa_aktif' => '2028-06-30',
                'berkas' => [1, 2, 3, 4, 5, 6, 7, 8],
            ],

            // 8. Anggota Tamu - Masa Aktif Habis (Nonaktif Keanggotaan)
            [
                'username' => 'farahnabila',
                'status_pengguna' => 1,
                'nama_lengkap' => 'Drh. Farah Nabila',
                'nama_panggilan' => 'Farah',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1989-01-15',
                'jenis_kelamin' => 'Perempuan',
                'alumni' => 'Institut Pertanian Bogor',
                'tahun_alumni' => '2013',
                'nama_pasangan' => 'Ilham Pratama',
                'alamat_rumah' => 'Jl. Cirendeu Raya No. 30, Ciputat Timur, Tangsel',
                'no_telp' => '081234567808',
                'email' => 'farah.nabila@example.com',
                'bidang_kerja' => 'Praktek Mandiri',
                'nama_klinik' => 'Ciputat Pet Care Centre',
                'alamat_klinik' => 'Jl. Ir. H. Juanda No. 55, Ciputat',
                'no_telp_klinik' => '0217402345',
                'domisili_anggota' => 'Tamu',
                'tanggal_terdaftar' => '2021-02-14',
                'masa_aktif' => '2024-02-14', // Expired
                'berkas' => [1, 2, 3, 4, 5, 6, 7, 8],
            ],

            // 9. Anggota Tamu - Masa Aktif Habis (Nonaktif Keanggotaan)
            [
                'username' => 'ekopurnomo',
                'status_pengguna' => 1,
                'nama_lengkap' => 'Drh. Eko Purnomo',
                'nama_panggilan' => 'Eko',
                'tempat_lahir' => 'Malang',
                'tanggal_lahir' => '1985-06-25',
                'jenis_kelamin' => 'Laki-Laki',
                'alumni' => 'Universitas Brawijaya',
                'tahun_alumni' => '2009',
                'nama_pasangan' => 'Endang Sri',
                'alamat_rumah' => 'Jl. Raya Rangkasbitung No. 17, Lebak, Banten',
                'no_telp' => '081234567809',
                'email' => 'eko.purnomo@example.com',
                'bidang_kerja' => 'Klinik & Peternakan Sapi Perah',
                'nama_klinik' => 'Rangkasbitung Vet Care',
                'alamat_klinik' => 'Jl. Multatuli No. 24, Rangkasbitung',
                'no_telp_klinik' => '0252203344',
                'domisili_anggota' => 'Tamu',
                'tanggal_terdaftar' => '2020-09-05',
                'masa_aktif' => '2023-09-05', // Expired
                'berkas' => [1, 2, 3, 4, 5, 6, 7, 8],
            ],

            // 10. Calon Anggota (Pendaftar Baru) - Belum Terverifikasi - Berkas Lengkap (Menunggu Verifikasi)
            [
                'username' => 'annisasafitri',
                'status_pengguna' => 1,
                'nama_lengkap' => 'Drh. Annisa Safitri',
                'nama_panggilan' => 'Annisa',
                'tempat_lahir' => 'Bogor',
                'tanggal_lahir' => '1995-08-30',
                'jenis_kelamin' => 'Perempuan',
                'alumni' => 'Institut Pertanian Bogor',
                'tahun_alumni' => '2019',
                'nama_pasangan' => '-',
                'alamat_rumah' => 'Jl. Graha Raya Bintaro Blok GR 5 No. 8, Serpong Utara',
                'no_telp' => '081234567810',
                'email' => 'annisa.safitri@example.com',
                'bidang_kerja' => 'Klinik Hewan Kesayangan',
                'nama_klinik' => 'Graha Animal Clinic',
                'alamat_klinik' => 'Ruko Melia Walk Blok MD No. 10, Graha Raya',
                'no_telp_klinik' => '0215319888',
                'domisili_anggota' => 'Tetap',
                'tanggal_terdaftar' => null, // Belum Terverifikasi
                'masa_aktif' => null,
                'berkas' => [1, 2, 3, 4, 5, 6, 7, 8],
            ],

            // 11. Calon Anggota (Pendaftar Baru) - Belum Terverifikasi - Berkas Lengkap
            [
                'username' => 'bayupratama',
                'status_pengguna' => 1,
                'nama_lengkap' => 'Drh. Bayu Pratama',
                'nama_panggilan' => 'Bayu',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '1994-03-14',
                'jenis_kelamin' => 'Laki-Laki',
                'alumni' => 'Universitas Airlangga',
                'tahun_alumni' => '2018',
                'nama_pasangan' => 'Ria Sukma',
                'alamat_rumah' => 'Jl. Cikupa Asri Blok A2 No. 15, Tangerang Regency',
                'no_telp' => '081234567811',
                'email' => 'bayu.pratama@example.com',
                'bidang_kerja' => 'Praktek Hewan Eksotik & Kesayangan',
                'nama_klinik' => 'Citra Raya Pet Clinic',
                'alamat_klinik' => 'Ruko Mardi Gras Blok KC No. 3, Citra Raya',
                'no_telp_klinik' => '0215961234',
                'domisili_anggota' => 'Tamu',
                'tanggal_terdaftar' => null, // Belum Terverifikasi
                'masa_aktif' => null,
                'berkas' => [1, 2, 3, 4, 5, 6, 7, 8],
            ],

            // 12. Calon Anggota (Pendaftar Baru) - Belum Terverifikasi - Berkas Sebagian (5 Berkas)
            [
                'username' => 'gitagutawa',
                'status_pengguna' => 1,
                'nama_lengkap' => 'Drh. Gita Kencana',
                'nama_panggilan' => 'Gita',
                'tempat_lahir' => 'Tangerang',
                'tanggal_lahir' => '1996-10-10',
                'jenis_kelamin' => 'Perempuan',
                'alumni' => 'Universitas Syiah Kuala',
                'tahun_alumni' => '2020',
                'nama_pasangan' => '-',
                'alamat_rumah' => 'Jl. KH. Hasyim Ashari No. 90, Cipondoh, Kota Tangerang',
                'no_telp' => '081234567812',
                'email' => 'gita.kencana@example.com',
                'bidang_kerja' => 'Praktek Dokter Hewan',
                'nama_klinik' => 'Cipondoh Pet House',
                'alamat_klinik' => 'Jl. KH Hasyim Ashari No. 95, Tangerang',
                'no_telp_klinik' => '0215570123',
                'domisili_anggota' => null,
                'tanggal_terdaftar' => null,
                'masa_aktif' => null,
                'berkas' => [1, 2, 3, 4, 7], // Partial files
            ],

            // 13. Calon Anggota (Pendaftar Baru) - Belum Terverifikasi - Berkas Sebagian (3 Berkas)
            [
                'username' => 'rizkyramadhan',
                'status_pengguna' => 1,
                'nama_lengkap' => 'Drh. Rizky Ramadhan',
                'nama_panggilan' => 'Rizky',
                'tempat_lahir' => 'Medan',
                'tanggal_lahir' => '1995-01-21',
                'jenis_kelamin' => 'Laki-Laki',
                'alumni' => 'Universitas Hasanuddin',
                'tahun_alumni' => '2019',
                'nama_pasangan' => '-',
                'alamat_rumah' => 'Jl. Ciater Raya No. 45, Serpong, Tangerang Selatan',
                'no_telp' => '081234567813',
                'email' => 'rizky.ramadhan@example.com',
                'bidang_kerja' => 'Praktek Mandiri',
                'nama_klinik' => 'Ciater Pet & Equine Care',
                'alamat_klinik' => 'Jl. Ciater Barat No. 12, Serpong',
                'no_telp_klinik' => '0217588123',
                'domisili_anggota' => null,
                'tanggal_terdaftar' => null,
                'masa_aktif' => null,
                'berkas' => [1, 2, 3], // Only foto, ijazah, ktp
            ],

            // 14. Calon Anggota (Pendaftar Baru) - Belum Terverifikasi - Berkas Lengkap
            [
                'username' => 'dewisartika',
                'status_pengguna' => 1,
                'nama_lengkap' => 'Drh. Dewi Sartika',
                'nama_panggilan' => 'Dewi',
                'tempat_lahir' => 'Solo',
                'tanggal_lahir' => '1993-11-17',
                'jenis_kelamin' => 'Perempuan',
                'alumni' => 'Universitas Gadjah Mada',
                'tahun_alumni' => '2017',
                'nama_pasangan' => 'Teguh Prabowo',
                'alamat_rumah' => 'Perum Modernland Blok CR No. 11, Kota Tangerang',
                'no_telp' => '081234567814',
                'email' => 'dewi.sartika@example.com',
                'bidang_kerja' => 'Klinik Hewan Kesayangan',
                'nama_klinik' => 'Modernland Vet Clinic',
                'alamat_klinik' => 'Ruko Modern Town Market Blok A No. 7, Modernland',
                'no_telp_klinik' => '0215528899',
                'domisili_anggota' => 'Tetap',
                'tanggal_terdaftar' => null,
                'masa_aktif' => null,
                'berkas' => [1, 2, 3, 4, 5, 6, 7, 8],
            ],

            // 15. Anggota Tetap - Akun Ditangguhkan (status_pengguna = 2 Nonaktif)
            [
                'username' => 'faisalbasri',
                'status_pengguna' => 2, // Akun Nonaktif
                'nama_lengkap' => 'Drh. Faisal Basri',
                'nama_panggilan' => 'Faisal',
                'tempat_lahir' => 'Palembang',
                'tanggal_lahir' => '1987-04-10',
                'jenis_kelamin' => 'Laki-Laki',
                'alumni' => 'Institut Pertanian Bogor',
                'tahun_alumni' => '2011',
                'nama_pasangan' => 'Mira Lestari',
                'alamat_rumah' => 'Jl. Raya Serpong KM 8, Pakulonan, Serpong Utara',
                'no_telp' => '081234567815',
                'email' => 'faisal.basri@example.com',
                'bidang_kerja' => 'Rumah Sakit Hewan',
                'nama_klinik' => 'Serpong Pet Hospital',
                'alamat_klinik' => 'Jl. Pahlawan Seribu No. 99, Tangsel',
                'no_telp_klinik' => '0215381122',
                'domisili_anggota' => 'Tetap',
                'tanggal_terdaftar' => '2023-10-10',
                'masa_aktif' => '2027-10-10',
                'berkas' => [1, 2, 3, 4, 5, 6, 7, 8],
            ],

            // 16. Anggota Tamu - Akun Ditangguhkan (status_pengguna = 2 Nonaktif)
            [
                'username' => 'indahpermatasari',
                'status_pengguna' => 2, // Akun Nonaktif
                'nama_lengkap' => 'Drh. Indah Permatasari',
                'nama_panggilan' => 'Indah',
                'tempat_lahir' => 'Surakarta',
                'tanggal_lahir' => '1990-09-09',
                'jenis_kelamin' => 'Perempuan',
                'alumni' => 'Universitas Airlangga',
                'tahun_alumni' => '2014',
                'nama_pasangan' => 'Bambang Irawan',
                'alamat_rumah' => 'Jl. Raya Cirendeu No. 12, Ciputat Timur',
                'no_telp' => '081234567816',
                'email' => 'indah.permata@example.com',
                'bidang_kerja' => 'Praktek Dokter Hewan',
                'nama_klinik' => 'Cirendeu Vet Care',
                'alamat_klinik' => 'Jl. Cirendeu Indah No. 3, Ciputat Timur',
                'no_telp_klinik' => '0217492211',
                'domisili_anggota' => 'Tamu',
                'tanggal_terdaftar' => '2022-11-25',
                'masa_aktif' => '2026-11-25',
                'berkas' => [1, 2, 3, 4, 5, 6, 7, 8],
            ],

            // 17. Anggota Tetap - Aktif - Berkas Lengkap
            [
                'username' => 'dennysetiawan',
                'status_pengguna' => 1,
                'nama_lengkap' => 'Drh. Denny Setiawan',
                'nama_panggilan' => 'Denny',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1992-07-04',
                'jenis_kelamin' => 'Laki-Laki',
                'alumni' => 'Institut Pertanian Bogor',
                'tahun_alumni' => '2016',
                'nama_pasangan' => 'Yuliana Santi',
                'alamat_rumah' => 'Jl. Villa Melati Mas Blok J No. 14, Serpong Utara',
                'no_telp' => '081234567817',
                'email' => 'denny.setiawan@example.com',
                'bidang_kerja' => 'Praktek Hewan Kesayangan & Bedah',
                'nama_klinik' => 'Melati Mas Animal Clinic',
                'alamat_klinik' => 'Ruko Melati Mas Square Blok A No. 1, BSD',
                'no_telp_klinik' => '0215383344',
                'domisili_anggota' => 'Tetap',
                'tanggal_terdaftar' => '2024-04-12',
                'masa_aktif' => '2028-04-12',
                'berkas' => [1, 2, 3, 4, 5, 6, 7, 8],
            ],

            // 18. Anggota Tamu - Aktif - Berkas Lengkap
            [
                'username' => 'fitrianimaharani',
                'status_pengguna' => 1,
                'nama_lengkap' => 'Drh. Fitriani Maharani',
                'nama_panggilan' => 'Fitri',
                'tempat_lahir' => 'Denpasar',
                'tanggal_lahir' => '1991-05-16',
                'jenis_kelamin' => 'Perempuan',
                'alumni' => 'Universitas Udayana',
                'tahun_alumni' => '2015',
                'nama_pasangan' => 'Ketut Sudarma',
                'alamat_rumah' => 'Jl. WR Supratman No. 20, Ciputat, Tangsel',
                'no_telp' => '081234567818',
                'email' => 'fitriani.maharani@example.com',
                'bidang_kerja' => 'Klinik Hewan Kesayangan & Akupunktur',
                'nama_klinik' => 'Harmoni Pet Care',
                'alamat_klinik' => 'Jl. Menjangan Raya No. 8, Ciputat',
                'no_telp_klinik' => '0217429988',
                'domisili_anggota' => 'Tamu',
                'tanggal_terdaftar' => '2023-09-09',
                'masa_aktif' => '2027-09-09',
                'berkas' => [1, 2, 3, 4, 5, 6, 7, 8],
            ],
        ];

        DB::beginTransaction();

        try {
            foreach ($samples as $s) {
                // Check if username already exists, delete previous sample if re-seeding
                $existingDokter = DB::table('dokter')->where('username', $s['username'])->first();
                if ($existingDokter) {
                    DB::table('berkas_dokter')->where('id_dokter', $existingDokter->id)->delete();
                    DB::table('dokter')->where('id', $existingDokter->id)->delete();
                    if ($existingDokter->id_klinik) {
                        DB::table('klinik')->where('id', $existingDokter->id_klinik)->delete();
                    }
                    if ($existingDokter->id_keanggotaan) {
                        DB::table('keanggotaan')->where('id', $existingDokter->id_keanggotaan)->delete();
                    }
                }
                DB::table('pengguna')->where('username', $s['username'])->delete();

                // 1. Insert Pengguna
                DB::table('pengguna')->insert([
                    'username' => $s['username'],
                    'password' => $defaultPassword,
                    'status_pengguna' => $s['status_pengguna'],
                    'id_kelas_pengguna' => 1, // User / Dokter
                ]);

                // 2. Insert Klinik
                $klinikId = DB::table('klinik')->insertGetId([
                    'nama_klinik' => $s['nama_klinik'],
                    'alamat_klinik' => $s['alamat_klinik'],
                    'no_telp_klinik' => $s['no_telp_klinik'],
                ]);

                // 3. Insert Keanggotaan
                $keanggotaanId = DB::table('keanggotaan')->insertGetId([
                    'domisili_anggota' => $s['domisili_anggota'],
                    'tanggal_terdaftar' => $s['tanggal_terdaftar'],
                    'masa_aktif' => $s['masa_aktif'],
                ]);

                // 4. Insert Dokter
                $dokterId = DB::table('dokter')->insertGetId([
                    'nama_lengkap' => $s['nama_lengkap'],
                    'nama_panggilan' => $s['nama_panggilan'],
                    'tempat_lahir' => $s['tempat_lahir'],
                    'tanggal_lahir' => $s['tanggal_lahir'],
                    'jenis_kelamin' => $s['jenis_kelamin'],
                    'alumni' => $s['alumni'],
                    'tahun_alumni' => $s['tahun_alumni'],
                    'nama_pasangan' => $s['nama_pasangan'],
                    'alamat_rumah' => $s['alamat_rumah'],
                    'no_telp' => $s['no_telp'],
                    'email' => $s['email'],
                    'bidang_kerja' => $s['bidang_kerja'],
                    'username' => $s['username'],
                    'id_klinik' => $klinikId,
                    'id_keanggotaan' => $keanggotaanId,
                ]);

                // 5. Insert Berkas
                if (!empty($s['berkas'])) {
                    foreach ($s['berkas'] as $idJenisBerkas) {
                        DB::table('berkas_dokter')->insert([
                            'nama_berkas' => $dummyFile,
                            'id_jenis_berkas' => $idJenisBerkas,
                            'id_dokter' => $dokterId,
                        ]);
                    }
                }
            }

            DB::commit();
            $this->command->info('18 Dokter sample records seeded successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->command->error('Seeding failed: ' . $e->getMessage());
            throw $e;
        }
    }
}
