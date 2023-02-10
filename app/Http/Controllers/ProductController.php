<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latest = Product::latest()->paginate(24);
        return view('pages.product.index', [
            'latest' => $latest,
        ]);
    }

    public function category($slug)
    {
        $latest = Product::join('categories', 'categories.id', '=', 'products.category_id')
            ->where('categories.name', $slug)
            ->select(['products.*'])
            ->paginate(12);

        return view('pages.product.index', [
            'query' => $slug,
            'latest' => $latest,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function search(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required',
        ]);

        $latest = Product::where('title', 'like', '%' . $request->title . '%')->paginate(12);

        return view('pages.product.index', [
            'query' => $request->title,
            'latest' => $latest,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $latest = Product::latest()->paginate(4);

        return view('pages.product.show', [
            'product' => $product,
            'latest' => $latest,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
