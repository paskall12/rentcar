<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penyewa extends Model
{
    use SoftDeletes;

    protected $fillable = ['nama', 'alamat', 'telp', 'no_sim'];

    // Sesuaikan dengan nama tabel jika tidak sesuai konvensi
    protected $table = 'penyewa';

    public function pesankendaraans()
    {
        return $this->hasMany(Pesankendaraan::class, 'penyewa_id'); // Sesuaikan foreign key jika diperlukan
    }
}
