<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rincian_bukti extends Model
{
    use HasFactory;
    protected $table = 'rincian_bukti';
    protected $guarded = [];

    public function target_pembelajaran()
    {
        return $this->belongsTo(Target_pembelajaran::class,'id_target_pembelajaran');
    }
}
