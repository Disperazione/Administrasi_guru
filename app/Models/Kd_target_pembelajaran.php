<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kd_target_pembelajaran extends Model
{
    use HasFactory;
    protected $table = 'kd_target_pembelajaran';
    protected $guarded = [];
    public function target_pembelajaran()
    {
        return $this->belongsTo(Target_pembelajaran::class, 'id_target_pembelajaran');
    }
    public function kompetensi_dasar()
    {
        return $this->belongsTo(Kompetensi_dasar::class, 'id_kompetensi_dasar');
    }
}
