<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
    ];
    
    public function images() {
        return $this->hasMany(ProductImage::class);
    }
    public function store() {
        return $this->belongsTo(Store::class);
    }
}
