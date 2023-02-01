<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Requests\Variable\StoreVariableRequest;
use App\Models\Attribute;
use App\Models\Type;

class ProductController extends Controller
{
    private $active;

    public function __construct()
    {
        $this->middleware('auth');
        $this->active = "products";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', [
            'products' => $products,
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
        $types = Type::all();
        $categories = Category::all();
        return view('admin.products.create', [
            'active' => $this->active,
            'categories' => $categories,
            'types' => $types,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->title = $request->title;

        $product->category_id = $request->category_id;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;

        $product->image = $this->uploadImage($request->file('image'));

        if ($request->type_id > 1) {
            $product->type_id = $request->type_id;
            $product->price = NULL;
        } else {
            $product->price = $request->price;
        }

        $product->save();

        if ($request->type_id < 2) {
            return redirect()->route('admin.products.index')->with('status', $request->title . ' a été enregistrer avec succes !');
        }

        return redirect()->route('admin.products.attr.create', $product);
    }

    private function uploadImage($requestImage)
    {
        if ($requestImage) {
            $file = $requestImage;
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path("assets/products"), $filename);
            return $filename;
        }
    }

    public function createdAddAttr(Product $product)
    {
        $selected_id = [];
        // $selected_name = [];

        foreach ($product->values as $item) {
            array_push($selected_id, $item->pivot->value_id);
        }

        // foreach($product->values as $item) {
        //     array_push($selected_name, $item->name);
        // }

        //dd($selected_name);

        $attributes = Attribute::all();
        return view('admin.products.createAddAttr', [
            'product' => $product,
            'selected_id' => $selected_id,
            //'selected_name' => $selected_name,
            'attributes' => $attributes,
            'active' => $this->active,
        ]);
    }

    public function storeAddAttr(StoreVariableRequest $request, Product $product)
    {
        $array = [
            $request->attribute_id => ['price' => 0]
        ];
        $product->attributes()->attach($array);

        return redirect()->route('admin.products.attr.create', $product);
    }

    public function storeAddValue(Request $request, Product $product)
    {
        //dd($request);
        $array = [
            $request->attribute_id => ['price' => $request->price]
        ];
        $product->attributes()->syncWithoutDetaching($array);

        if($product->values()->wherePivot('attribute_id', '=', $request->attribute_id)->get()) {
            $product->values()->wherePivot('attribute_id', '=', $request->attribute_id)->syncWithPivotValues($request->values, ['attribute_id' => $request->attribute_id]);
        } else {
            $product->values()->syncWithPivotValues($request->values, ['attribute_id' => $request->attribute_id]);
        }



        //$product->values()->syncWithPivotValues();

        return redirect()->route('admin.products.attr.create', $product);
    }

    public function deleteValueAndAttr(Product $product, $attribute_id)
    {
        $product->attributes()->detach($attribute_id);

        $product->values()->wherePivot('attribute_id', '=', $attribute_id)->sync([]);

        return redirect()->route('admin.products.attr.create', $product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $types = Type::all();
        $categories = Category::all();
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $categories,
            'types' => $types,
            'active' => $this->active
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $image = $request->file('image');
        if ($image) {
            try {
                unlink("assets/products/" . $product->image);
            } catch (\Throwable $th) {
            }
        }

        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;

        if ($request->type_id > 1) {
            $product->type_id = $request->type_id;
            $product->price = NULL;
        } else {
            $product->price = $request->price;
        }

        if ($image) {
            $product->image = $this->uploadImage($request->file('image'));
        }

        $product->update();

        if ($request->type_id < 2) {
            return redirect()->route('admin.products.index')->with('status', $request->title . ' a été modifier avec succes !');
        }

        return redirect()->route('admin.products.attr.create', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            unlink("assets/products/" . $product->image);
        } catch (\Throwable $th) {
        }

        $name = $product->name;

        $product->delete();

        return redirect()->route('admin.products.index')->with('status', "Le produit " . $name . " vient d'être supprimer !");
    }
}
