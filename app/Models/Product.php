<?php

namespace App\Models;

use App\Models\Shop;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $translate = [
        'name',
        'description',
        'price',
        'cover_img',
        'shop_id'
    ];

    protected static function booted()
    {
        static::saving(function ($product) {

            $product->product_attributes = json_encode(request('product_attributes'));
        });
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }
}
