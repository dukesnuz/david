<?php

namespace David\Http\Controllers;

use Illuminate\Http\Request;
use David\Url;
use David\Category;

class UrlController extends Controller
{
    public function url()
    {
        $urls = Url::with('category')->get(); //->take(10)->inRandomOrder()->get();
        //dd($urls->toArray());
        return view('links')->with('urls', $urls);
    }
}
