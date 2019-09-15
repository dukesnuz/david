<?php

namespace David\Http\Controllers;

use Illuminate\Http\Request;
use David\Url;

class UrlController extends Controller
{
    public function url()
    {
        $urls = Url::all();
        return view('links')->with('urls', $urls);
    }
}
