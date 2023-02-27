<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

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
        $products = Product::latest()->paginate(15);
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
        $categories = Category::all();
        return view('admin.products.create', [
            'active' => $this->active,
            'categories' => $categories,
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
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;

        $product->image = $this->uploadImage($request->file('image'));

        $product->save();
        
        $gallery = (new AttachmentController)->store($request, $product->id);

        return redirect()->route('admin.products.index')->with('status', $request->title . ' a été enregistrer avec succes !');
    }

    private function uploadImage($requestImage)
    {
        if ($requestImage) {
            //dd($requestImage);
            $file = $requestImage;
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path("assets/products"), $filename);
            $path = public_path("assets\products\\" . $filename);
            dd($path);
            $img = Image::make($path);
            $img->fit(500, 500);
            $img->save(public_path("assets\products\\thumbnails\\" . $filename));
            return $filename;
        }
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
        $categories = Category::all();
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $categories,
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
            unlink("assets/products/" . $product->image);
            unlink("assets/products/thumbnails" . $product->image);
        }

        $product->title = $request->title;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;

        if ($image) {
            $product->image = $this->uploadImage($request->file('image'));
        }

        $product->update();

        return redirect()->route('admin.products.index')->with('status', $request->title . ' a été modifier avec succes !');
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
            unlink("assets/products/thumbnails" . $product->image);
        } catch (\Throwable $th) {
        }

        $name = $product->name;

        $product->delete();

        return redirect()->route('admin.products.index')->with('status', "Le produit " . $name . " vient d'être supprimer !");
    }
}
