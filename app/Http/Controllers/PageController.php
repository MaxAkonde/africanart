<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function shop()
    {
        return view('pages.shop');
    }
}
