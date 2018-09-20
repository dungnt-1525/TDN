<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use \Cart as Cart;
use App\Models\Product;
use Sentinel;
use Validator;
use App\Models\ProductAttribute;
use App\Repositories\ProductAttributeRepositoryEloquent;
use App\Repositories\CouponProgramRepositoryEloquent;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon = new CouponProgramRepositoryEloquent();
        $dataPA = new ProductAttributeRepositoryEloquent();
        $coupons = $coupon->checkCouponProgram(1, 1);
        $carts = Cart::content();
        $user = Sentinel::getUser();
        $slug = '';
        foreach ($carts as $item) {
            $slug = str_slug($item->name);
        }
        $pas = $dataPA->getImagesAll(100);

        return view('frontend.cart.showCart', compact('user', 'pas', 'coupons', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if (!$duplicates->isEmpty()) {
            return redirect('cart')->withSuccessMessage(__('Item is already in your cart!'));
        }

        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Models\Product');
        return redirect('cart')->withSuccessMessage(__('Item was added to your cart!'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        Cart::update($id, $request->quantity);
        session()->flash('success_message', __('Quantity was updated successfully!'));

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect('cart')->withSuccessMessage(__('Item has been removed!'));
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyCart()
    {
        Cart::destroy();
        return redirect('cart')->withSuccessMessage(__('Your cart has been cleared!'));
    }

    /**
     * Switch item from shopping cart to wishlist.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToWishlist($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if (!$duplicates->isEmpty()) {
            return redirect('cart')->withSuccessMessage(__('Item is already in your Wishlist!'));
        }

        Cart::instance('wishlist')->add($item->id, $item->name, 1, $item->price)
                                  ->associate('App\Models\Product');

        return redirect('cart')->withSuccessMessage(__('Item has been moved to your Wishlist!'));
    }

    public function updateCart(Request $request, $id)
    {
        $qty = $request->input('quantity');
        if ($qty > 30) {
            $qty = 30;
            Cart::update($id, $qty);
            session()->flash('error_message', __('Please contact hotline: 0968 394 311'));

            return redirect('cart');
        } else {
            if ($qty == '' || $qty < 1) {
                $qty = 1;
            }
            Cart::update($id, $qty);
            session()->flash('success_message', __('Quantity was updated successfully!'));

            return redirect('cart')->withSuccessMessage(__('Quantity was updated successfully!'));
        }
    }
}
