<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumber_belajar extends Model
{
    use HasFactory;
    protected $table = 'sumber_belajar';
    protected $guarded = [];

    public function indikator_ketercapaian()
    {
        return $this->belongsTo(Indikator_ketercapaian::class, 'id_indikator_ketercapaian'); // foreign
    }
}
