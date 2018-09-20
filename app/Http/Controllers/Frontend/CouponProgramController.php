<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CouponProgram;
use App\Models\Product;
use App\Models\Category;
use \Cart as Cart;
use Sentinel;
use App\Repositories\CategoryRepositoryEloquent;
use App\Repositories\CouponProgramRepositoryEloquent;
use App\Repositories\ProductAttributeRepositoryEloquent;

class CouponProgramController extends Controller
{
    public function check(Request $request)
    {
        $user = Sentinel::getUser();
        $code = $request->input('coupon');

        $dataCat = new CategoryRepositoryEloquent();
        $coupon = new CouponProgramRepositoryEloquent();
        $dataPA = new ProductAttributeRepositoryEloquent();

        $pas = $dataPA->getImagesAll(100);
        $parentIds = $dataCat->getCategoryByParentId(100);
        $parentNulls = $dataCat->getCategoryByParentIdIsNull();
        $products = Product::all();
        $categories = Category::all();
        $carts = Cart::content();
        $coupons = $coupon->checkCouponProgram(0, 1);
        if ($carts->count() >0) {
            foreach ($carts as $cart) {
                $p = $cart->id;
                $coupons = $coupon->checkCouponProgram($code, $p);
            }
        }

        return view('frontend.cart.showCart', compact('parentIds', 'products', 'parentNulls', 'coupons', 'pas', 'categories', 'user'));
    }
}
