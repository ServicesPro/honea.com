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

        $houses = Product::where('name', 'Maison et bureau')->take(6)->get();

        $men = Product::where('name', 'Mode Homme')->take(6)->get();

        $women = Product::where('name', 'Mode Femme')->take(6)->get();

        return view('welcome', compact('allProducts', 'bestProducts', 'dayProducts', 'categories', 'men', 'women'));
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
