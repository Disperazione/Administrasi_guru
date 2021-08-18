<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator_ketercapaian extends Model
{
    use HasFactory;
    protected $table = 'indikator_ketercapaian';
    protected $guarded = [];

    public function kompetensi_dasar()
    {
        return $this->belongsTo(Kompetensi_dasar::class, 'id_kompetensi_dasar');
    }

    public function alat_bahan()
    {
        return $this->hasMany(Alat_bahan::class, 'id', 'id_indikator_ketercapaian');
    }
}
