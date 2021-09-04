<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar_cloud extends Model
{
    use HasFactory;
    protected $table = 'komentar_cloud';
    protected $guarded = [];

    public function admin_cloud()
    {
        return $this->belongsTo(Admin_cloud::class,'id_admin_cloud');
    }
}
