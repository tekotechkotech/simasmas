<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $fillable = [
        'masjid_id',
        'nama',
        'jumlah',
        'kondisi',
        'foto'
    ];

    public function masjid()
    {
        return $this->belongsTo(Masjid::class);
    }
}
