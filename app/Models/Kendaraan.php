<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kendaraan extends Model
{
    use SoftDeletes;

    protected $fillable = ['merk', 'model', 'nomor_plat', 'harga', 'status'];

    // Sesuaikan dengan nama tabel jika tidak sesuai konvensi
    protected $table = 'kendaraan';

    public function pesankendaraans()
    {
        return $this->hasMany(Pesankendaraan::class, 'kendaraan_id'); // Sesuaikan foreign key jika diperlukan
    }
}
