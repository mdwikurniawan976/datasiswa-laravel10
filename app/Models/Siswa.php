<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table ='siswas';
    protected $fillable = ['foto', 'nama', 'nis', 'tanggal', 'kelas_id'];

    public function kelas(){
        return $this->belongsTo(Kelas::class,'kelas_id');
    }
}
