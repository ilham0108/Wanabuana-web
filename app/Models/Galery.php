<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;
    protected $table = "db_galery";

    protected $fillable = [
        'image',
        'category',
    ];

    public function category()
    {
        return $this->belongsToMany(Category_galery::class, 'kode_transaksi', 'kode_transaksi');
    }
}
