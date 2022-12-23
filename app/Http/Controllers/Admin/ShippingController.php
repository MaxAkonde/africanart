<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Models\Shipping;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shipping\StoreShippingRequest;
use App\Http\Requests\Shipping\UpdateShippingRequest;

class ShippingController extends Controller
{
    private $active;

    public function __construct()
    {
        $this->middleware('auth');
        $this->active = "shippings";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipping = Shipping::latest()->paginate(10);
        return view('admin.shippings.index', [
            'shippings' => $shipping,
            'active' => $this->active,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.shippings.create', [
            'countries' => $countries,
            'active' => $this->active,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShippingRequest $request)
    {
        $shipping = new Shipping();
        $shipping->name = $request->name;
        $shipping->price = $request->price;
        $shipping->country_id = $request->country_id;
        $shipping->slug = Str::slug($shipping->name);

        $shipping->save();

        return redirect()->route('admin.shippings.index')->with('status', $request->name . ' a été enregistrer avec succes !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        $countries = Country::all();
        return view('admin.shippings.edit', [
            'shipping' => $shipping,
            'countries' => $countries,
            'active' => $this->active
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShippingRequest $request, Shipping $shipping)
    {
        $shipping->name = $request->name;
        $shipping->price = $request->price;
        $shipping->country_id = $request->country_id;
        $shipping->slug = Str::slug($shipping->name);

        $shipping->update();

        return redirect()->route('admin.shippings.index')->with('status', $request->name . ' a été modifier avec success !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        $name = $shipping->name;

        $shipping->delete();

        return redirect()->route('admin.shippings.index')->with('status', "La livraison " . $name . " vient d'être supprimer !");
    }
}
