<?php

namespace App\Models;

use App\Models\Shop;
use App\Models\User;
use App\Models\Product;
use App\Models\SubOrder;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function items()
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id')->withPivot('quantity', 'price');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the orderItems for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function products()
    {
        # todo
    }

    public function getShippingFullAddressAttribute()
    {

        return  $this->shipping_fullname . "<br>" . $this->shipping_address . ', ' . $this->shipping_city . ', ' . $this->shipping_state . ', ' . $this->shipping_zipcode . "<br> phone: " . $this->shipping_phone;
    }

    public function subOrders()
    {
        return $this->hasMany(SubOrder::class);
    }

    public function generateSubOrders()
    {
        $orderItems = $this->items;

        foreach ($orderItems->groupBy('shop_id') as $shopId => $products) {

            $shop = Shop::find($shopId);

            $suborder = $this->subOrders()->create([
                'order_id' => $this->id,
                'seller_id' => $shop->user_id ?? 1,
                'grand_total' => $products->sum('pivot.price'),
                'item_count' => $products->count()
            ]);

            foreach ($products as $product) {
                $suborder->items()->attach($product->id, ['price' => $product->pivot->price, 'quantity' => $product->pivot->quantity,]);
            }
        }
    }
}
