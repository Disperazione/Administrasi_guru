<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alat_bahan extends Model
{
    use HasFactory;
    protected $table ='alat_bahan';
    protected $guarded = [];

    public function indikator_ketercapaian()
    {
        return $this->belongsTo(Indikator_ketercapaian::class, 'id_indikator_ketercapaian'); // foreign
    }
}
