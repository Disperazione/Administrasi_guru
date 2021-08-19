<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'mapel';
    protected $guarded = [];

    public function guru()
    {
        return $this->belongsTo(Guru::class,'id_guru','id');
    }
    public function bidang_keahlian()
    {
        return $this->hasMany(Bidang_keahlian::class,'id_mapel','id'); //foreign owner
    }
}
