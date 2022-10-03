<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::latest()->get();

        $categories = Category::where('parent_id', 0)->get();

        $products = Product::latest()->take(6)->get();

        $productsRecommend = Product::latest('views_count', 'desc')->take(12)->get();

        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();

        return view('home.home', compact('sliders', 'categories', 'products', 'productsRecommend', 'categorysLimit'));
    }
}
