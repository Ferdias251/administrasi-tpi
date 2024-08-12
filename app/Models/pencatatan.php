<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pencatatan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_nelayan', 'nik', 'nama_perahu', 'ikan_masuk','jumlah_ikan','harga_per_kg', 'total_berat', 'total_pendapatan'];

    public function ikan()
    {
        return $this->hasMany(Ikan::class);
    }

    
}
