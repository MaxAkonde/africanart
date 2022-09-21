<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $latest = Product::latest()->paginate(8);
        $features = Product::paginate(5);
        return view('pages.home', [
            'latest' => $latest,
            'features' => $features,
        ]);
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function shop()
    {
        $latest = Product::latest()->paginate(9);
        return view('pages.shop', [
            'latest' => $latest,
        ]);
    }

    public function single(Product $product)
    {
        return view('pages.single', [
            'product' => $product
        ]);
    }

    public function checkout()
    {
        return view('pages.checkout');
    }
}
