<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Country;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\ProfileUserRequest;
use App\Http\Requests\Product\StoreProductRequest;

class UserController extends Controller
{
    public function commande()
    {
        if (Auth::check()) {
            $orders = Order::where('user_id', '=', Auth::user()->id)->get();

            return view('pages.user.commande', [
                'orders' => $orders
            ]);
        }

        return view('auth.login');
    }

    public function editprofil(User $user)
    {
        //dd($user);
        $countries = Country::all();
        return view('pages.profil', [
            'user' => $user,
            'countries' => $countries,
        ]);
    }

    public function updateprofil(ProfileUserRequest $request, User $user)
    {
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->company = $request->company;
        $user->phone = $request->phone;
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country_id = $request->country_id;

        $user->update();

        return redirect()->route('edit.user.profil', $user)->with('status', 'Votre profile a été modifier avec success !');
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
        $latest = Product::where('user_id', '=', Auth::user()->id)->paginate(12);

        return view('pages.myownshop', [
            'latest' => $latest,
        ]);
    }
}
