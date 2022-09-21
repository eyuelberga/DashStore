<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
     /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('store_id', Auth::user()->id)->get();
        return view("product.index")->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('store_id', Auth::user()->id)->get();
        return view("product.create")->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $request->file('image')->store('uploads', 'public');
        $product = Product::create([
                'name' => $request->name,
                'qty'=>$request->qty,
                'price'=>$request->price,
                'description'=>$request->description,
                'image'=> '/storage/uploads/'.$request->image->hashName(),
                'store_id' => Auth::user()->id,
            ]);
        $categories = Category::find($request->categories);
        $product->categories()->attach($categories);
        return redirect()->route('products.index')->with('success', 'Product is successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::where('store_id', Auth::user()->id)->get();
        return view('product.edit')->with(['product'=>$product,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($request->hasFile('image')) {
            $request->file('image')->store('uploads', 'public');
            $product->update([
                 'image'=> '/storage/uploads/'.$request->image->hashName(),
            ]);
        }
        $product->update([
               'name' => $request->name,
                'qty'=>$request->qty,
                'price'=>$request->price,
                'description'=>$request->description,
            ]);
        $categories = Category::find($request->categories);
        $product->categories()->detach();
        $product->categories()->attach($categories);

        return redirect()->route('products.index')->with('success', 'Product is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product is successfully deleted');
    }
}
