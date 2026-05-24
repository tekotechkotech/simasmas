<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    protected $fillable = [
        'masjid_id',
        'nama',
        'alamat',
        'no_hp',
        'rt',
        'rw'
    ];

    public function masjid()
    {
        return $this->belongsTo(Masjid::class);
    }
}
