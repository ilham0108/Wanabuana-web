<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;
    protected $table = "recruitment";
    protected $fillable = [
        'nim',
        'nama_lengkap',
        'nama_panggilan',
        'handphone',
        'tanggal_lahir',
        'fakultas',
        'program_studi',
        'surat_sehat',
        'surat_izin_orang_tua',
        'foto',
        'bukti_pembayaran',
    ];
}
