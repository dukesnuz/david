<?php

namespace David\Http\Controllers;

use Illuminate\Http\Request;
use David\Blogpost;
use David\Blogcategory;
use David\Blogtag;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("blog.index");
    }

    //get last blog post
    public function getLastBlogPost()
    {
        $lastBlogPost = Blogpost::orderBy('created_at', 'desc')->with('Blogcategory')->with('blogtags')->first();
        return $lastBlogPost;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogPostCreate(Request $request)
    {
        // validate data
        $this->validate($request, [
            'category' => 'required',
            'subject' => 'required',
            'body' => 'required',
        ]);
        //get category id  to store in Blogpost
        $cat_id = Blogcategory::where('categories', '=', $request->input('category'))->first();

        // Store post in db
        $post = new Blogpost();
        $post->subject = $request->input('subject');
        $post->body = $request->input('body');
        $post->ip = request()->ip();
        $post->category_id = $cat_id->id;
        $post->save();

        $newPost = Blogpost::where('id', '=', $post->id)->first();
        // loop through each tag and get tag id and insert into blogtags table
        foreach ($request->input('checkedTags') as $value) {
            $tag = Blogtag::where('name', '=', $value)->first();
            $newPost->blogtags()->save($tag);
        }
        return response()->JSON(array('messageReturned' => 'ok', 'postId' => $post->id));
    }

    // get all blog categories
    public function getAllBlogCategories()
    {
        $categories = Blogcategory::orderBy('categories', 'ASC')->get();
        return $categories;
    }

    // get all blog tags
    public function getAllBlogTags()
    {
        $tags = Blogtag::orderBy('name', 'ASC')->get();
        return $tags;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAllBlogPosts()
    {
        $posts = Blogpost::orderBy('created_at', 'DESC')->with('Blogcategory')->with('Blogtags')->get();
        return $posts;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
