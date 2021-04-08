<?php

namespace App\Models;

use App\Models\Product;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\Category as ModelsCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends ModelsCategory
{
    use HasFactory, Translatable;

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_categories');
    }

    public function allProducts()
    {
        $allProducts = collect([]);

        $mainCategoryProducts = $this->products;

        $allProducts = $allProducts->concat($mainCategoryProducts);

        if($this->children->isNotEmpty()) {
            foreach($this->children as $child) {
                $allProducts = $allProducts->concat($child->products);
            }
        }

        return $allProducts;
    }
}
