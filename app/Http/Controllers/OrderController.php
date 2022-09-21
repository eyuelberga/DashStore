<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
    * Create the controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->authorizeResource(Order::class, 'order');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('store_id', Auth::user()->id)->get();
        return view("order.index")->with('orders', $orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $store, StoreOrderRequest $request)
    {
        $order =  Order::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_name' => $request->company_name,
            'country' => $request->country,
            'city' => $request->city,
            'postcode' => $request->postcode,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'phone' => $request->phone,
            'email' => $request->email,
            'store_id' => $store->id,
            ]);

        $cart_id = 'cart-'.$store->id;
        $cart = session()->get($cart_id);
        foreach ($cart as $id => $product) {
            $order->products()->attach($id, ['price'=>$product['price'],'qty'=>$product['qty']]);
        };
        foreach ($order->products as $product) {
            $product->update(['qty'=>$product->qty - $cart[$product->id]['qty']]);
        }
        session()->put($cart_id, []);
        return view('storefront.order')->with(['order'=>$order,'store'=>$store]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view("order.show")->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update(['status'=>$request->status]);
        return redirect()->route('orders.index')->with('success', 'Order Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
