<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckOutRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class CartController extends Controller
{
    public function add($id){
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'feature_image_path' => $product->feature_image_path
            ];
        }
        session()->put('cart', $cart);
        return response()->json(['code'=>200], 200);
    }
    public function show(){
        $carts = session()->get('cart');
        return view('cart.showCart', compact('carts'));
    }
    public function update(Request $request){
        if($request->id && $request->quantity){
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;

            session()->put('cart', $carts);
            return response()->json(['code'=>200], 200);
        }
    }

    public function delete(Request $request)
    {
        if($request->id){
            $carts = session()->get('cart');
            unset($carts[$request->id]);

            session()->put('cart', $carts);
            return response()->json(['code'=>200], 200);
        }
    }

    public function deleteAll()
    {
        session()->flush();
        return response()->json(['code'=>200], 200);
    }

    public function checkOutForm()
    {
        $carts = session()->get('cart');
        return view('cart.checkOutForm', compact('carts'));
    }

    public function checkOut(CheckOutRequest $request)
    {
        $carts = session()->get('cart');
        $cus_id = 1;
        $status = 0;
        DB::beginTransaction();
        try {
            if($order = Order::create([
                'customer_id' => $cus_id,
                'order_note'=>$request->note,
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'status'=>$status
            ])){
                $order_id = $order->id;
                foreach ($carts as $product_id => $cart){
                    $quantity = $cart['quantity'];
                    $price= $cart['price'];
                    OrderDetail::create([
                        'order_id' => $order_id,
                        'product_id'=> $product_id,
                        'price'=>$price,
                        'quantity'=>$quantity
                    ]);
                }
            }
            DB::commit();
            session()->flush();

            return redirect()->back()->with('alert', 'updated succesfully');


        }catch (\Exception $exception){
            DB::rollback();
            var_dump("Order error");
        }
    }
}
