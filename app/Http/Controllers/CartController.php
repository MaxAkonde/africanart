<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.cart');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $product = Product::find($request->id);

        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id == $request->id;
        });

        if ($duplicata->isNotEmpty()) {
            return redirect()->back()->with('success', $request->title . ' à déjà été ajouté au panier !');
        }

        $product = Product::find($request->id);

        Cart::add($product->id, $product->title, 1, $product->price)
            ->associate('App\Models\Product');

        return redirect()->back()->with('success', $product->title . ' ajouter à votre panier.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        $data = $request->json()->all();

        Cart::update($rowId, $data['qty']);

        Session::flash('success', 'Quantité du produit mise à jour');

        return response()->json(['success' => 'Quantité du panier mise à jour']);
    }

    public function empty()
    {
        Cart::destroy();

        return redirect()->route('shop');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);

        return redirect()->back()->with('success', 'Suppression effectuter !');
    }
}
