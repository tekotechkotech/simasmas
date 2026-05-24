<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [
        'masjid_id',
        'judul',
        'bulan',
        'tahun',
        'file_path',
        'generated_at'
    ];

    public function masjid()
    {
        return $this->belongsTo(Masjid::class);
    }
}
