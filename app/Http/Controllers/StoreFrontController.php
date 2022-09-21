<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Product;
use App\Models\Category;

class StoreFrontController extends Controller
{
    private function isActive(Store $store)
    {
        if (!$store->active) {
            abort(404);
        }
    }

    public function index(Store $store)
    {
        $this->isActive($store);
        return view('storefront.index')->with(['store'=>$store]);
    }

    public function product(Store $store, Product $product)
    {
        $this->isActive($store);
        return view('storefront.product')->with(['store'=>$store,'product'=>$product]);
    }

    public function category(Store $store, Category $category)
    {
        $this->isActive($store);
        return view('storefront.category')->with(['store'=>$store,'category'=>$category]);
    }

    public function categoryProduct(Store $store, Category $category, Product $product)
    {
        $this->isActive($store);
        return view('storefront.product')->with(['store'=>$store,'category'=>$category, 'product'=>$product]);
    }

    public function cart(Store $store)
    {
        $this->isActive($store);
        return view('storefront.cart')->with(['store'=>$store]);
    }

    public function addToCart(Store $store, Request $request)
    {
        $this->isActive($store);
        $cart_data = ['name'=>$request->name,'price'=>$request->price,'qty'=>$request->qty];
        $cart_id = 'cart-'.$store->id;
        $cart = session()->get($cart_id);
        if (is_array($cart)) {
            $cart[$request->id] = $cart_data;
        } else {
            $cart = [$request->id=>$cart_data];
        }
        session()->put($cart_id, $cart);

        return redirect()->back()->with('success', "Item added to Cart!");
    }

    public function updateCart(Store $store, Request $request)
    {
        $this->isActive($store);
        $cart_id = 'cart-'.$store->id;
        $cart = session()->get($cart_id);
        if (is_array($cart)) {
            $cart[$request->id]['qty'] = $request->qty;
        }
        session()->put($cart_id, $cart);

        return redirect()->back()->with('success', "Cart updated!");
    }

    public function removeCart(Store $store, $id)
    {
        $this->isActive($store);
        $cart_id = 'cart-'.$store->id;
        $cart = session()->get($cart_id);
        if (is_array($cart)) {
            unset($cart[$id]);
            session()->put($cart_id, $cart);
        }


        return redirect()->back()->with('success', "Cart updated!");
    }

    public function checkout(Store $store)
    {
        $this->isActive($store);
        $cart_id = 'cart-'.$store->id;
        $cart = session()->get($cart_id);
        $products = Product::find(array_keys($cart));
        $errors = array();
        foreach ($products as $product) {
            if ($product->qty < $cart[$product->id]['qty']) {
                $errors[$product->name] = "Only ".$product->qty." is in stock";
            }
        }
        if (empty($errors)) {
            return view('storefront.checkout')->with(['store'=>$store]);
        }
        return redirect()->route("storefront.cart", $store)->with('cart_errors', $errors);
    }
}
