<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KeuanganExport implements FromView, ShouldAutoSize, WithStyles
{
    protected $laporan;
    protected $keuangans;
    protected $masjid;

    public function __construct($laporan, $keuangans, $masjid)
    {
        $this->laporan = $laporan;
        $this->keuangans = $keuangans;
        $this->masjid = $masjid;
    }

    public function view(): View
    {
        return view('laporan.excel', [
            'laporan' => $this->laporan,
            'keuangans' => $this->keuangans,
            'masjid' => $this->masjid
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 14]],
            2 => ['font' => ['bold' => true, 'size' => 12]],
            4 => ['font' => ['bold' => true]],
        ];
    }
}
