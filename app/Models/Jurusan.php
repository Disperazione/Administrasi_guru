<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = 'jurusan';
    protected $guarded = [];

    public function guru()
    {
        return $this->hasMany(Guru::class, 'id_jurusan','id');
    }
}
