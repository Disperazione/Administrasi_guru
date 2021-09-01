<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_cloud extends Model
{
    use HasFactory;
    protected $table = 'admin_cloud';
    protected $guarded = [];

    public function bidang_keahlian()
    {
        return $this->belongsTo(Bidang_keahlian::class, 'id_bidang_keahlian');
    }
    public function komentar_cloud()
    {
        return $this->hasMany(Komentar_cloud::class, 'id_admin_cloud','id');
    }
}
