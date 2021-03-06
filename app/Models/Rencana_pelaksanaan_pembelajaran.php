<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rencana_pelaksanaan_pembelajaran extends Model
{
    use HasFactory;
    protected $table = 'rencana_pelaksanaan_pembelajaran';
    protected $guarded = [];

    public function kompetensi_dasar()
    {
        return $this->belongsTo(Kompetensi_dasar::class, 'id_kompetensi_dasar');
    }
    public function pertemuan_rpp()
    {
        return $this->hasMany(Pertemuan_rpp::class, 'id_rencana_pelaksanaan_pembelajaran','id');
    }
}
