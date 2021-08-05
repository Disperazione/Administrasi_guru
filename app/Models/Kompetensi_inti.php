<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kompetensi_inti extends Model
{
    use HasFactory;
    protected $table = 'kompetensi_inti';
    protected $guarded = [];

    public function target_pembelajaran()
    {
        return $this->belongsTo(Target_pembelajaran::class, 'id_target_pembelajaran');
    }
}
