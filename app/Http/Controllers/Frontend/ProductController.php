<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\ProductAttribute;
use App\Repositories\ProductRepositoryEloquent;
use App\Repositories\CategoryRepositoryEloquent;
use App\Repositories\CouponProgramRepositoryEloquent;
use App\Repositories\ProductAttributeRepositoryEloquent;

class ProductController extends Controller
{
    /**
     * Get all records and return view all with this data
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $dataCat = new CategoryRepositoryEloquent();
        $dataCP = new CouponProgramRepositoryEloquent();
        $dataPA = new ProductAttributeRepositoryEloquent();

        $pas = $dataPA->getImagesAll(100);
        $products = Product::all();
        $categories = Category::all();
        $parentIds = $dataCat->getCategoryByParentId(100);
        $parentNulls = $dataCat->getCategoryByParentIdIsNull();
        $coupons = $dataCP->getCoupon(100);

        return view('frontend.products.product', compact('products', 'categories', 'parentIds', 'parentNulls', 'coupons', 'pas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show($slug)
    {
        $dataPA = new ProductAttributeRepositoryEloquent();
        $dataCat = new CategoryRepositoryEloquent();

        $pas = $dataPA->getImages(100, $slug);
        $paColors = $dataPA->getColor(100, $slug);
        $product = Product::where('slug', $slug)->firstOrFail();
        $interested = Product::where('slug', '!=', $slug)->get()->random(4);
        $colors = Color::all();
        $categories = Category::all();
        $products = Product::all();
        $parentIds = $dataCat->getCategoryByParentId(100);
        $parentNulls = $dataCat->getCategoryByParentIdIsNull();

        return view('frontend.products.showProduct', compact('product', 'interested', 'colors', 'categories', 'products', 'parentIds', 'parentNulls', 'pas', 'paColors'));
    }
    /**
     * @param  interger $id
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function showPrdByCatId($id)
    {
        $data = new ProductRepositoryEloquent();
        $dataCat = new CategoryRepositoryEloquent();

        $dataCP = new CouponProgramRepositoryEloquent();
        $coupons = $dataCP->getCoupon(100);
        $categories = Category::all();
        $categoryId = Category::find($id);
        $param = 9;
        $products = $data->getProductByCategoryId($param, $id);
        $parentIds = $dataCat->getCategoryByParentId($id);
        $parentNulls = $dataCat->getCategoryByParentIdIsNull();

        return view('frontend.categories.showCategory', compact('categories', 'categoryId', 'products', 'parentIds', 'parentNulls', 'coupons'));
    }
}
