<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Product\StoreProductRequest;

class PageController extends Controller
{
    public function home()
    {
        $latest = Product::latest()->paginate(8);
        $active = "home";

        $categories = DB::table('categories')
            ->select(["categories.name", "categories.slug", "categories.image", DB::raw("COUNT(products.category_id) as product_count")])
            ->join('products', 'products.category_id', '=', 'categories.id')
            ->groupBy('categories.name')
            ->groupBy('categories.slug')
            ->groupBy('categories.image')
            ->get();

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
        $latest = Product::latest()->paginate(12);
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
        if (Auth::check()) {
            $orders = Order::where('user_id', '=', Auth::user()->id)->get();

            return view('pages.commande', [
                'orders' => $orders
            ]);
        }

        return view('auth.login');
    }

    public function search(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required',
        ]);

        $latest = Product::where('title', 'like', '%' . $request->title . '%')->paginate(12);

        return view('pages.shop', [
            'query' => $request->title,
            'latest' => $latest,
        ]);
    }

    public function category($slug)
    {
        $latest = Product::join('categories', 'categories.id', '=', 'products.category_id')
            ->where('categories.name', $slug)
            ->select(['products.*'])
            ->paginate(9);

        return view('pages.shop', [
            'query' => $slug,
            'latest' => $latest,
        ]);
    }

    public function addproduct()
    {
        $categories = Category::all();
        return view('pages.addproduct', [
            'categories' => $categories,
        ]);
    }

    public function storeproduct(StoreProductRequest $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;

        if (Auth::check()) {
            $product->user_id = Auth::user()->id;
        }

        $product->image = $this->uploadImage($request->file('image'));

        $product->save();

        return redirect()->route('myshop');
    }

    private function uploadImage($requestImage)
    {
        if ($requestImage) {
            $file = $requestImage;
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/products'), $filename);
            return $filename;
        }
    }

    public function myshop()
    {
        $latest = Product::where('user_id', '=', Auth::user()->id)->paginate(9);
        
        return view('pages.myownshop', [
            'latest' => $latest,
        ]);
    }
}
