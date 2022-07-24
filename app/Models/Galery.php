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
        'category_id',
    ];

    public function category()
    {
        return $this->hasMany(Category_galery::class, 'id', 'category_id');
    }
}
