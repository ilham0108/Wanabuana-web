<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = "db_anggota";
    protected $fillable = [
        'nama',
        'posisi',
        'foto',
    ];
}
