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
        $urls = Url::with('category')->with('tags')->take(10)->inRandomOrder()->get();
        return view('links')->with('urls', $urls);
    }

    public function create()
    {

        // grab categories
        $categories = Category::orderBy('categories', 'ASC')->get();
        // grab tags
        $tagsForCheckBoxes = Tag::getTagsForCheckBoxes();

        // add to array
        $categoriesForDrop = [];
        foreach ($categories as $category) {
            $categoriesForDrop[$category->id] = $category->categories;
        }

        return view('create')->with([
          'categoriesForDrop' => $categoriesForDrop,
          'tagsForCheckBoxes' => $tagsForCheckBoxes,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'subject' => 'required|min:3',
          'link' => 'required|min:3',
          'category_id' => 'required|numeric',
      ]);

        $url = new Url();
        $url->subject = $request->subject;
        $url->link = $request->link;
        $url->description = $request->description;
        $url->category_id = $request->category_id;
        $url->save();

        // check if tags seleceted
        if ($request->tags) {
            $tags = $request->tags;
        } else {
            $tags = [];
        }
        $url->tags()->sync($tags);
        $url->save();

        return redirect('/get-list')->with('alert', 'The link '.$request->input('subject').  ' was added.');
    }
}
