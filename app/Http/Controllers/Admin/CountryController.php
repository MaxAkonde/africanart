<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Country\StoreCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;

class CountryController extends Controller
{
    private $active;

    public function __construct()
    {
        $this->middleware('auth');
        $this->active = "countries";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::latest()->get();
        return view('admin.countries.index', [
            'countries' => $countries,
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
        return view('admin.countries.create', [
            'active' => $this->active,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountryRequest $request)
    {
        $country = new Country();
        $country->name = $request->name;
        $country->slug = Str::slug($country->name);

        $country->save();

        return redirect()->route('admin.countries.index')->with('status', $request->name . ' a été enregistrer avec succes !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('admin.countries.edit', [
            'country' => $country,
            'active' => $this->active
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        $country->update($request->all());

        return redirect()->route('admin.countries.index')->with('status', $request->name . ' a été modifier avec success !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $name = $country->name;

        $country->delete();

        return redirect()->route('admin.countries.index')->with('status', "Le pays " . $name . " vient d'être supprimer !");
    }
}
