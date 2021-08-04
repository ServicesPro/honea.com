<?php

namespace App\Models;

use App\Models\Product;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory, Translatable;

    protected $table = 'order_items';

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);

    }
}
