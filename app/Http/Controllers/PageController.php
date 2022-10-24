<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function home()
    {
        $latest = Product::latest()->paginate(8);
        $categories = Category::all();
        $active = "home";
        return view('pages.home', [
            'latest' => $latest,
            'categories' => $categories,
            'active' => $active,
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
        $latest = Product::latest()->paginate(4);

        return view('pages.single', [
            'product' => $product,
            'latest' => $latest,
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

    public function commande()
    {
        return view('pages.commande');
    }

    public function search(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required',
        ]);

        $latest = Product::where('title', 'like', '%' . $request->title . '%')->paginate(9);

        return view('pages.shop', [
            'query' => $request->title,
            'latest' => $latest,
        ]);
    }
}
