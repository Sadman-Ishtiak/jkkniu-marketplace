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
        'current_price',
        'status',
        'ends_at',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
