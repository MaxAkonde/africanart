<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attribute;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Attribute\StoreAttributeRequest;
use App\Http\Requests\Attribute\UpdateAttributeRequest;

class AttributeController extends Controller
{
    private $active;

    public function __construct()
    {
        $this->middleware('auth');
        $this->active = "attributes";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::latest()->paginate(10);
        return view('admin.attributes.index', [
            'attributes' => $attributes,
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
        return view('admin.attributes.create', [
            'active' => $this->active,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttributeRequest $request)
    {
        $attribute = new Attribute();
        $attribute->name = $request->name;
        $attribute->slug = Str::slug($attribute->name);

        $attribute->save();

        return redirect()->route('admin.attributes.index')->with('status', $request->name . ' a été enregistrer avec succes !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        return view('admin.attributes.edit', [
            'attribute' => $attribute,
            'active' => $this->active
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttributeRequest $request, Attribute $attribute)
    {

        $attribute->name = $request->name;
        $attribute->slug = Str::slug($attribute->name);

        $attribute->update();

        return redirect()->route('admin.attributes.index')->with('status', $request->name . ' a été modifier avec success !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        $name = $attribute->name;

        $attribute->delete();

        return redirect()->route('admin.attributes.index')->with('status', "L'attribut " . $name . " vient d'être supprimer !");
    }
}
