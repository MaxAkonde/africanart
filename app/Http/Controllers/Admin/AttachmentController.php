<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Product;
use Illuminate\Http\Request;
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

    public function destroy(Attachment $attachment, )
    {

    }
}
