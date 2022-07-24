<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_galery extends Model
{
    use HasFactory;
    protected $table = "db_category_galery";

    protected $fillable = [
        'category',
    ];

    public function category()
    {
        return $this->hasMany(Galery::class, 'id', 'category_id');
    }
}
