<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metode_pembelajaran extends Model
{
    use HasFactory;
    protected $table = 'metode_pembelajaran';
    protected $guarded = [];

    public function strategi_pembelajaran()
    {
        return $this->belongsTo(Strategi_pembelajaran::class, 'id_strategi_pembelajaran');
    }
}
