<?php

namespace David\Http\Controllers;

use Illuminate\Http\Request;
use David\Url;
use David\Category;
use David\Tag;

class UrlController extends Controller
{
    public function url()
    {
        //$urls = Url::with('category')->get(); //->take(10)->inRandomOrder()->get();
        //return view('links')->with('urls', $urls);
        $urls = Url::with('tags')->get();
        foreach ($urls as $key => $url) {
            dump($url->subject);
            foreach ($url->tags as $key => $tag) {
                dump($tag->name);
            }
        }
    }
}
