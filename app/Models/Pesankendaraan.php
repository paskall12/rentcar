<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pesankendaraan extends Model
{
    use SoftDeletes;

    protected $fillable = ['kendaraan_id', 'penyewa_id', 'tanggal_sewa', 'tanggal_kembali', 'lama_penggunaan', 'total_biaya'];
    protected $table = 'pesankendaraan';
    // Relasi dengan Kendaraan
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    // Relasi dengan Penyewa
    public function penyewa()
    {
        return $this->belongsTo(Penyewa::class);
    }
}
