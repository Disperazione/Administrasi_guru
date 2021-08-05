<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan_rpp extends Model
{
    use HasFactory;
    protected $table = 'pertemuan_rpp';
    protected $guarded = [];

    public function rencana_pelaksanaan_pembelajaran()
    {
        return $this->belongsTo(Rencana_pelaksanaan_pembelajaran::class, 'id_rencana_pelaksanaan_pembelajaran');
    }
}
