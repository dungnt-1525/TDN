<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\ProductController;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\ProductAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sentinel;
use Mail;
use \Cart as Cart;
use App\Repositories\ProductAttributeRepositoryEloquent;

class OrderController extends Controller
{
    public function index()
    {
        $user = Sentinel::getUser();
        $or = Order::withTrashed()
                ->where('id', 45)
                ->get();

        return view('frontend.cart.inforOrder', compact('user'));
    }

    public function showMyOrders()
    {
        $user = Sentinel::getUser();
        $orders = Order::all();
        $order_details = OrderDetail::all();
        $product_attributes = ProductAttribute::all();
        $products = Product::all();
        $prds = new ProductAttributeRepositoryEloquent();
        $ps = $prds->getProductByPAId(100);
        $imgs = $prds->getImagesAll(100);

        return view('frontend.user.myOrder', compact('user', 'orders', 'order_details', 'products', 'product_attributes', 'ps', 'imgs'));
    }

    public function showById($id)
    {
        $user = Sentinel::getUser();
        $order = Order::where('id', $id)->firstOrFail();
        $order_details = OrderDetail::all();
        $product_attributes = ProductAttribute::all();
        $products = Product::all();
        $prds = new ProductAttributeRepositoryEloquent();
        $ps = $prds->getProductByPAId(100);
        $imgs = $prds->getImagesAll(100);

        return view('frontend.cart.orderDetail', compact('user', 'order', 'order_details', 'products', 'product_attributes', 'ps', 'imgs'));
    }

    public function create(Request $request)
    {
        $user = Sentinel::getUser();
        $orders = Order::all();
        $order_details = OrderDetail::all();
        $product_attributes = ProductAttribute::all();
        $products = Product::all();
        $prds = new ProductAttributeRepositoryEloquent();
        $ps = $prds->getProductByPAId(100);
        $imgs = $prds->getImagesAll(100);

        if (Cart::count() > 0) {
            $cartItems = Cart::content();
            $prds = ProductAttribute::all();
            $dataOrder = $request->only([
                'user_id',
                'name',
                'payment_method_id',
                'address',
                'amount',
                'phone'
            ]);

            $order = $this->storeOrder($dataOrder);
            $order->save();

            foreach ($cartItems as $item) {
                foreach ($prds as $prd) {
                    $prd_id = $prd->product_id;
                    if ($item->id == $prd_id) {
                        OrderDetail::create([
                            'product_attribute_id' => $item->id,
                            'quantity' => $item->qty,
                            'order_id' => $order->id,
                            'price_sale' => $item->price,
                        ]);
                    }
                }
            }

            Cart::destroy();
            $this->sendEmailConfirm($order, $user);

            return view('frontend.user.myOrder', compact('user', 'orders', 'order_details', 'products', 'product_attributes', 'ps', 'imgs'));
        } else {
            return redirect('/');
        }
    }

    private function storeOrder(array $data)
    {
        $order = new Order();

        $order->user_id = Sentinel::check()? Sentinel::getUser()->id : null;
        $order->name = $data['name'];
        $order->payment_method_id = 1;
        $order->address = $data['address'];
        $order->amount = $data['amount'];
        $order->phone = $data['phone'];
        $order->created_at = date('Y-m-d H:i:s');
        $order->updated_at = date('Y-m-d H:i:s');

        return $order;
    }

    /**
     * @param unknown $user
     * @param unknown $code
     */
    private function sendEmailConfirm($order, $user)
    {
        Mail::send('frontend.cart.confirm', [
            'order' => $order,
            'user' => $user,
        ], function($message) use ($user, $order) {
            $message->from(env('MAIL_USERNAME'), __('LUXURY FURNITURE'));
            $message->to($user->email);
            $message->subject(__('Luxury Furniture confirm order ') . $order->id);
        });
    }

    public function cancel($id)
    {
        $user = Sentinel::getUser();
        $orderDetail = Orderdetail::where('order_id', $id)->delete();
        $order = Order::where('id', $id)->delete();

        $orders = Order::all();
        $order_details = OrderDetail::all();
        $product_attributes = ProductAttribute::all();
        $products = Product::all();
        $prds = new ProductAttributeRepositoryEloquent();
        $ps = $prds->getProductByPAId(100);
        $imgs = $prds->getImagesAll(100);

        return view('frontend.user.myOrder', compact('user', 'orders', 'order_details', 'products', 'product_attributes', 'ps', 'imgs'));
    }
}
