<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CouponProgramRepositoryEloquent;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $products = Product::all();

        return view('frontend.products.product', compact('products', 'categories'));
    }
}
