<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index( $categoryId){
        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();
        $products = Product::where('category_id', $categoryId)->paginate(2);
        $categories = Category::where('parent_id', 0)->get();
        return view('product.category.list', compact('categorysLimit', 'products', 'categories'));
    }
}
