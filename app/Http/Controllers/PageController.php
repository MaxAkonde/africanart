<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\User\ProfileUserRequest;
use App\Models\Country;
use App\Models\Post;
use App\Models\User;

class PageController extends Controller
{
    public function home()
    {
        $latest = Product::latest()->paginate(8);
        $ramdom = Product::inRandomOrder()->limit(8)->get();
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
            'ramdom' => $ramdom,
            'categories' => $categories,
            'active' => $active,
        ]);
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
