<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Photo;
use App\Relation_rates;
use App\Rates;
use App\Relation_categories;
use Illuminate\Http\Request;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $relation_rates = Relation_rates::all();
        $relation_categories = Relation_categories::all();
        $rates = Rates::all();
        $photo = Photo::all();
        $category = Category::all();
        $products = Product::all();
        return view('products.index', compact('products', 'category', 'photo', 'rates', 'relation_rates', 'relation_categories'))->with('c', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $category = Category::all();
        $rates = Rates::all();
        return view('products.add', compact('category', 'rates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'rates' => 'required',
            'photo' => 'required'
        ]);

        $product = Product::create([
                    'name' => $request->name,
                    'description' => $request->description
        ]);

        Relation_categories::create([
            'product_id' => $product->id,
            'category_id' => $request->category,
        ]);
        
        Relation_rates::create([
            'product_id' => $product->id,
            'rates_id' => $request->rates,
        ]);

        if ($request->photo) {
            Photo::create([
                'photo' => $request->photo,
                'id_product' => $product->id,
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Product created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product) {
        $category = Category::all();
        $rates = Rates::all();
        return view('products.edit', compact('product', 'category', 'rates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'rates' => 'required',
        ]);

        $product->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        Relation_categories::where('product_id', '=', $product->id)->update([
            'product_id' => $product->id,
            'category_id' => $request->category,
        ]);
        
        Relation_rates::where('product_id', '=', $product->id)->update([
            'product_id' => $product->id,
            'rates_id' => $request->rates,
        ]);
        
        if ($request->photo) {
            Photo::where('id_product', '=', $product->id)->update([
                'photo' => $request->photo,
                'id_product' => $product->id,
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Product edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product) {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted!');
    }

}
