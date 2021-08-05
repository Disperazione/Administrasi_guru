<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target_pencapaian_mapel extends Model
{
    use HasFactory;
    protected $table = 'target_pencapaian_mapel';
    protected $guarded = [];

    public function target_pembelajaran()
    {
        return $this->belongsTo(Target_pembelajaran::class, 'id_target_pembelajaran');
    }
}
