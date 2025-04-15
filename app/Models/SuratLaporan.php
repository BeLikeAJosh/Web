<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratLaporan extends Model
{
    use HasFactory;
    protected $table = 'surat_aktif';
    protected $fillable = ['keperluan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
