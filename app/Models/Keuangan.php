<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $fillable = [
        'masjid_id',
        'jenis',
        'nominal',
        'kategori',
        'keterangan',
        'tanggal',
        'user_id'
    ];

    public function masjid()
    {
        return $this->belongsTo(Masjid::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
