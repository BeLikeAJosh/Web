<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    protected $primaryKey = 'id';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['nama', 'nrp', 'alamat', 'semester', 'fakultas', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
