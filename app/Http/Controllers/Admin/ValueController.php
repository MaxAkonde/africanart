<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Value\StoreValueRequest;
use App\Http\Requests\Value\UpdateValueRequest;
use App\Models\Attribute;
use App\Models\value;
use Illuminate\Http\Request;

class ValueController extends Controller
{
    private $active;

    public function __construct()
    {
        $this->middleware('auth');
        $this->active = "values";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $values = value::latest()->paginate(10);
        return view('admin.values.index', [
            'values' => $values,
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
        $attributes = Attribute::all();
        return view('admin.values.create', [
            'attributes' => $attributes,
            'active' => $this->active,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreValueRequest $request)
    {
        $value = new value();
        $value->name = $request->name;
        $value->attribute_id = $request->attribute_id;

        $value->save();

        return redirect()->route('admin.values.index')->with('status', $request->name . ' a été enregistrer avec succes !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\value  $value
     * @return \Illuminate\Http\Response
     */
    public function show(value $value)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\value  $value
     * @return \Illuminate\Http\Response
     */
    public function edit(value $value)
    {
        $attributes = Attribute::all();
        return view('admin.values.edit', [
            'value' => $value,
            'attributes' => $attributes,
            'active' => $this->active
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\value  $value
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateValueRequest $request, value $value)
    {
        $value->update($request->all());

        return redirect()->route('admin.values.index')->with('status', $request->name . ' a été modifier avec success !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\value  $value
     * @return \Illuminate\Http\Response
     */
    public function destroy(value $value)
    {
        $name = $value->name;

        $value->delete();

        return redirect()->route('admin.values.index')->with('status', "La valeur " . $name . " vient d'être supprimer !");
    }
}
