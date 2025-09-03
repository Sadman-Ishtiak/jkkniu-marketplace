<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'starting_price',
        'end_time',
        'user_id',
    ];

    // ✅ Define relationship to Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // (Optional) if you want to know which user created auction
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // (Optional) images if you’re using auction_images table
    public function images()
    {
        return $this->belongsToMany(Image::class, 'auction_images');
    }
}
