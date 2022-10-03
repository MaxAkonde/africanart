<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function confirmation($codepin)
    {
        $order = Order::where('pincode', '=', $codepin)->firstOrFail();
        return view('pages.confirmation', [
            'order' => $order,
        ]);
    }

    public function tracking()
    {
        return view('pages.tracking');
    }

    public function findOrder(Request $request)
    {
        //dd($request);
        $order = DB::table('orders')
            ->where('pincode', $request->order)
            ->where('email', $request->email)
            ->get();
        if (count($order)) {
            return redirect()->route('confirmation', $request->order);
        }

        return redirect()->route('tracking')->with('status', 'Veuillez entrer des informations');
    }
}
