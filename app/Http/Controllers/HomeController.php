<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $bestProducts = Product::where('best', true)->take(6)->get();

        $dayProducts = Product::take(6)->get();

        $allProducts = Product::take(30)->get();

        $categories = Category::whereNull('parent_id')->take(11)->get();

        return view('welcome', compact('allProducts', 'bestProducts', 'dayProducts', 'categories'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function distributeur()
    {
        return view('distributeur');
    }
}
