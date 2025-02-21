<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $guarded = [''];

    public function kelas(){
        return $this ->belongsTo(Kelas::class,'kelas_id');
    }

    public function guru(){
        return $this->belongsTo(Guru::class,'guru_id');
    }
}
