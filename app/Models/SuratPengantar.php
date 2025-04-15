<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratPengantar extends Model
{
    use HasFactory;
    protected $table = 'surat_aktif';
    protected $fillable = ['tujukan', 'matkul', 'data', 'tujuan', 'topik'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
