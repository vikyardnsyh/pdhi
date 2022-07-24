<?php

namespace App\Exports;

use App\Models\Dokter;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class dokterExport implements FromView, WithStyles, ShouldAutoSize
{
    public function __construct($anggota) {
        $this->data = $anggota;
    }

    public function view(): View
    {
        $anggota = ($this->data);
        return view('Administrator.adminLaporan.anggota', compact('anggota'));
    }
    
    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }
}
