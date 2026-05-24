<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = [
        'masjid_id',
        'judul',
        'deskripsi',
        'tanggal',
        'waktu',
        'lokasi'
    ];

    public function masjid()
    {
        return $this->belongsTo(Masjid::class);
    }
}
