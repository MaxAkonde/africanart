<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AttachmentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $gallery = $request->file('attachment');
        foreach ($gallery as $image) {
            $attachment = new Attachment();
            $attachment->image = $this->upload($image);
            $attachment->product_id = $id;
            $attachment->save();
        }
    }

    public function upload($file)
    {
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path("assets/products"), $filename);

        return $filename;
    }

    public function destroyByProduct(Product $product)
    {
        $attachment = DB::table('attachments')->where('product_id', $product->id)->get();
        foreach ($attachment as $item) {
            try {
                unlink("assets/products/" . $item->image);
            } catch (\Throwable $th) {
            }
        }
        $attachment = DB::table('attachments')->where('product_id', $product->id)->delete();
        return true;
    }
}
