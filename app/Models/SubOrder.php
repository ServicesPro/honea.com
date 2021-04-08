<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubOrder extends Model
{
    use HasFactory, Translatable;

    protected $guarded = [];

    public function items()
    {
        return $this->belongsToMany(Product::class, 'sub_order_items', 'sub_order_id', 'product_id')->withPivot('quantity', 'price');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
