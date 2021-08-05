<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strategi_pembelajaran extends Model
{
    use HasFactory;
    protected $table = 'strategi_pembelajaran';
    protected $guarded = [];

    public function kompetensi_dasar()
    {
        return $this->belongsTo(Kompetensi_dasar::class, 'id_kompetensi_dasar');
    }
}
