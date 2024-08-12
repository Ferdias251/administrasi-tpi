<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nelayan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'foto', 'nik', 'jenis_kelamin', 'umur', 'nama_perahu'];
}
