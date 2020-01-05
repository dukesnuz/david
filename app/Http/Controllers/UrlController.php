<?php

namespace David\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Pagination\Paginator;
//use David\Http\Requests;
use David\Url;
use David\Category;
use David\Tag;
use David\Search;
use David\Http\Resources\Link;
use David\Http\Resources\Search as SearchResource;

class UrlController extends Controller
{
    public function url()
    {
        $urls = Url::with('category')->with('tags')->take(150)->inRandomOrder()->get();
        return view('links.links')->with([
            'urls' => $urls,
            'title' => 'Favorite Websites Dukesnuz',
            'description' => 'A collection of favorite websites on Dukesnuz.',
            'keywords' => 'websites',
         ]);
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

        return view('links.create')->with([
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

        return redirect('links/get-list')->with('alert', 'The link '.$request->input('subject').  ' was added.');
    }

    public function createCategories()
    {
        $categories = Category::orderBy('categories', 'ASC')->get();
        return view('links.categories')
        ->with([
            'categories' => $categories,
            'title' => 'Categories | Favorite Websites',
            'description' => 'A collection of favorite websites on Dukesnuz.',
            'keywords' => 'websites',
         ]);
    }

    public function storeCategory(Request $request)
    {
        $this->validate($request, [
      'new_category' => 'required',
    ]);

        $category = new Category();
        $category->categories = $request->new_category;
        $category->save();

        return redirect('links/create-categories')->with('alert', 'The category '.$request->input('new_category').  ' was added.');
    }

    public function createTags()
    {
        $tags = Tag::orderBy('name', 'ASC')->get();
        return view('links.tags')
        ->with([
            'tags' => $tags,
            'title' => 'Tags | Favorite Websites',
            'description' => 'A collection of favorite websites on Dukesnuz.',
            'keywords' => 'websites',
         ]);
    }

    public function storeTag(Request $request)
    {
        $this->validate($request, [
      'new_tag' => 'required',
    ]);

        $tag = new Tag();
        $tag->name = $request->new_tag;
        $tag->save();

        return redirect('links/create-tags')->with('alert', 'The tag '.$request->input('new_tag').  ' was added.');
    }

    public function editUrl($id)
    {
        $url = Url::with('category')->with('tags')->find($id);
        $tags_for_checkbox = Tag::getTagsForCheckboxes();
        $categories_for_drop = Category::getCategoriesForDrop();
        $tags_for_this_link = [];
        foreach ($url->tags as $tag) {
            $tags_for_this_link[] = $tag->name;
        }

        return view('links/update-url')->with([
      'url' => $url,
      'tags_for_checkbox' => $tags_for_checkbox,
      'tags_for_this_link' => $tags_for_this_link,
      'categories_for_drop' =>  $categories_for_drop,
      'category_for_this_link' => $url->category->categories,
    ]);
    }

    public function updateUrl(Request $request, $id)
    {
        //  // grab tags
        $tagsForCheckBoxes = Tag::getTagsForCheckBoxes();

        $updateUrl = Url::find($id);
        $updateUrl ->tags()->sync($request->input('tags'));
        $updateUrl->subject = $request->input('subject');
        $updateUrl->link = $request->input('link');
        $updateUrl->description = $request->input('description');
        $updateUrl->category_id = $request->input('category');
        $updateUrl->save();

        return redirect('links/edit/'.$id.'')->with('alert', 'Your changes were saved.');
    }
    /*******is this being used ?
        public function category($category)
        {
            $urls =  Url::whereHas('category', function ($query) use ($category) {
                $query->where('categories', '=', $category);
            })->with('tags')->get();

            return view('links/category-show')->with([
          'urls' =>  $urls,
          'category' => $category
        ]);
        }
    */
    /*****is this being used ?
    public function tag($tag)
    {
        $urls = Url::whereHas('tags', function ($query) use ($tag) {
            $query->where('name', '=', $tag);
        })->with('category')->get();

        return view('links/tag-show')->with([
      'urls' =>  $urls,
      'tag' => $tag
    ]);
    }
*/
    /*** is this being used
        // show one link
        public function link($id)
        {
            $url = Url::with('category')->with('tags')->where('id', '=', $id)->first();
            return view('links.link')->with([
          'url' => $url,
        ]);
        }
    */
    // search page
    public function search()
    {
        return view('links.search')->with([
              'title' => 'Search | Favorite Websites',
              'description' => 'A collection of favorite websites on Dukesnuz.',
              'keywords' => 'websites',
           ]);
        ;
    }

    // get search results
    public function show($term)
    {
        $tags = Tag::where('name', 'LIKE', '%'.$term.'%')->get();
        // return links found
        $urls = Url::with('category')->with('tags')
    ->where('subject', 'LIKE', '%'.$term.'%')
    ->orWhere('link', 'LIKE', '%'.$term.'%')
    ->orWhere('description', 'LIKE', '%'.$term.'%')
    ->orWhereHas('tags', function ($query) use ($term) {
        $query->where('name', '=', $term);
    })
    ->orWhereHas('category', function ($query) use ($term) {
        $query->where('categories', '=', $term);
    })
    ->paginate(25);

        // add search term to search table
        $storeSearch = new Search();
        $storeSearch->term = $term;
        $storeSearch->ip = request()->ip();
        $storeSearch->save();

        //return collection of links as a resource
        return Link::collection($urls);
    }

    // get las x number of searches
    public function showAll()
    {
        $searches = Search::orderBy('created_at', 'desc')->take(15)->get();
        return SearchResource::collection($searches);
    }
}
