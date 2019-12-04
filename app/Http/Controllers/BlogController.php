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
        $lastBlogPost = Blogpost::orderBy('created_at', 'desc')->first();
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
        //$id = substr(mt_rand(1000000, 9999999), 2, 7);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAllBlogPosts()
    {
        $posts = Blogpost::orderBy('created_at', 'DESC')->get();
        return $posts;
    }

    /**
    * get a single blog post using the unique.
    * method returns blade
    *
    * @param int $id
    */
    public function blogPost($id, $slug = '')
    {
        $post = Blogpost::findOrFail($id);

        if ($slug !== $post->slug) {
            return redirect()->to($post->url);
        }
        return view('blog.show-a-post')->withPost($post)->with([
          'pid' => $post->id,
        ]);
    }

    // show specific post with category and tags
    public function showPost($id)
    {
        $post = Blogpost::where('id', '=', $id)->with('Blogcategorys')->with('Blogtags')->first();
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('blog.edit-blog-post')->with([
          'pid' => $id,
        ]);
    }
    /************************working here******************************/
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->toArray());
        //$newBook ->tags()->sync($request->input('tags'));

        // validate data
        $this->validate($request, [
            'category' => 'required',
            'subject' => 'required',
            'body' => 'required',
        ]);
        //get category id  to store in Blogpost
        $cat_id = Blogcategory::where('id', '=', $request->input('category_id'))->first();

        // Edit post in db
        $post = Blogpost::find($id);
        $post->subject = $request->input('subject');
        $post->body = $request->input('body');
        $post->ip = request()->ip();
        $post->category_id = $cat_id->id;
        $post->blogtags()->sync($request->input('blogtags'));
        $post->save();
        return response()->JSON(array('messageReturned' => 'ok'));
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
