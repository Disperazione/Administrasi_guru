<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipk_kompetensi_dasar extends Model
{
    use HasFactory;
    protected $table = 'ipk_kompetensi_dasar';
    protected $guarded = [];

    public function kompetensi_dasar()
    {
        return $this->belongsTo(Kompetensi_dasar::class,'id_kompetensi_dasar');
    }
}
