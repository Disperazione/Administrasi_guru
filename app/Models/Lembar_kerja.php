<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembar_kerja extends Model
{
    use HasFactory;
    protected $table = 'lembar_kerja';
    protected $guarded = []; // mass asisment

    public function bidang_keahlian()
    {
        return $this->belongsTo(Bidang_keahlian::class, 'id_bidang_keahlian');
    }
}
