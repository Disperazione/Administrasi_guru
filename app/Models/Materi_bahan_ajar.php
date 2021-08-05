<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi_bahan_ajar extends Model
{
    use HasFactory;
    protected $table = 'materi_bahan_ajar';
    protected $guarded = [];

    public function kompetensi_dasar()
    {
        return $this->belongsTo(Kompetensi_dasar::class, 'id_kompetensi_dasar');
    }
}
