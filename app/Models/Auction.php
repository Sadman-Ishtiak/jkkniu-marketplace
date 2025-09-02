<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'starting_price',
        'end_date',
        'seller_id',
    ];

    // 👇 Many-to-many relationship
    public function images()
    {
        return $this->belongsToMany(Image::class, 'auction_images');
    }

}
