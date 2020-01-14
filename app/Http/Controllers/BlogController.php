<?php

namespace David\Http\Controllers;

use Illuminate\Http\Request;
use David\Blogpost;
use David\Blogcategory;
use David\Blogcomment;
use David\Blogtag;
use David\Email;
use David\Blogsearch;
use David\Http\Resources\Post;
use David\Http\Resources\BlogSearch as BlogSearchResource;
use Illuminate\Support\Facades\Auth;

use Mail;

class BlogController extends Controller
{

  //email subscribe
    public function emailSubscribe(Request $request)
    {
        $this->validate($request, [
      'name' => 'required',
      'email' => 'email',
    ]);

        // first check if email already in db
        $email = Email::where('email', '=', $request->input('email'))->first();

        if ($email !== null) {
            return back()->withInput()->with("alert", "You are already subscribed. Thank you");
        } else {
            $subscribe = new Email();
            $subscribe->name = $request->input('name');
            $subscribe->email = $request->input('email');
            $subscribe->ip = request()->ip();
            $subscribe->save();
            if ($subscribe->id > 1) {
                return back()->withInput()->with("alert", "Thank you for subscribing!");
            } else {
                return back()->withInput()->with("alert", "OOppss System Error.");
            }
        }
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view("blog.index")->with([
              'title' => 'Website Development & Technology Blog | Dukesnuz',
              'description' => 'A blog about website development and technology at Dukesnuz.
               Coding tutorials and technolgy topics are the main subjects',
              'keywords' => 'website development, computer technology',
           ]);
        ;
    }

    //get last blog post
    public function getLastBlogPost()
    {
        $lastBlogPost = Blogpost::where('is_live', '=', 1)->orderBy('created_at', 'desc')->first();
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
      'metaDescription' => 'required',
      'urlFriendly' => 'required',
    ]);
        //get category id  to store in Blogpost
        $cat_id = Blogcategory::where('categorys', '=', $request->input('category'))->first();

        // Store post in db
        $post = new Blogpost();
        $post->subject = $request->input('subject');
        $post->body = $request->input('body');
        $post->ip = request()->ip();
        $post->blogcategory_id = $cat_id->id;
        $post->meta_description = $request->input('metaDescription');
        $post->url_friendly = $request->input('urlFriendly');
        $post->save();

        $newPost = Blogpost::where('id', '=', $post->id)->first();
        // loop through each tag and get tag id and insert into blogtags table
        foreach ($request->input('checkedTags') as $value) {
            $tag = Blogtag::where('name', '=', $value)->first();
            $newPost->blogtags()->save($tag);
        }
        return response()->JSON(array('messageReturned' => 'ok', 'postId' => $post->id));
    }

    // get all blog categorys
    public function getAllBlogCategories()
    {
        $categorys = Blogcategory::orderBy('categorys', 'ASC')->get();
        return $categorys;
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
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function storeCategory(Request $request)
    {
        // Store new category in db
        $store = new Blogcategory();
        $store->categorys = ucfirst(strtolower($request->input('name')));
        $store->save();
        return response()->JSON(array('messageReturned' => 'ok'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function storeTag(Request $request)
    {
        // Store new category in db
        $store = new Blogtag();
        $store->name = ucfirst(strtolower($request->input('name')));
        $store->save();
        return response()->JSON(array('messageReturned' => 'ok'));
    }

    /**
    * get only live blog posts
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function showLiveBlogPosts()
    {
        $posts = Blogpost::where('is_live', '=', 1)->orderBy('created_at', 'DESC')->get();
        return $posts;
    }

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
    public function blogPost($id, $cat = "", $slug = '')
    {
        $post = Blogpost::where('id', '=', $id)
        ->with('Blogcategory')
        ->with('Blogtags')
        ->get()->first();

        //check if user logged in and post is live
        if ($post == null || ($post->is_live == 0 && !Auth::check())) {
            abort(404);
        }
        $keywords = $post->blogtags->implode('name', ', ');
        $description = $post->meta_description;
        $title = $post->subject;

        if ($slug !== $post->slug) {
            return redirect()->to($post->url);
        }

        return view('blog.show-a-post')->withPost($post)->with([
      'pid' => $post->id,
      'subject' => $post->subject,
      'title' => $title,
      'description' => $description,
      'keywords' => $keywords,
      'urlFriendly' => $post->url_friendly,
      'metaDescription' => $post->meta_description,
    ]);
    }

    // show specific post with category and tags
    public function showPost($id)
    {
        $post = Blogpost::where('id', '=', $id)->with('Blogcategory')->with('Blogtags')->first();
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

    // edit post status live or not
    // edit comment status, live or not live
    public function editPostStatus($id, $status)
    {
        $editPost = Blogpost::find($id);
        $editPost->is_live = ($status == 0)? 1 : 0;
        $editPost->save();

        return response()->JSON(array('messageReturned' => 'ok'));
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
        $validator = \Validator::make(request()->all(), [
      'blogcategory' => 'required',
      'subject' => 'required',
      'body' => 'required',
      'url_friendly' => 'required',
      'meta_description' => 'required',
    ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'data' => $validator->errors()]);
        }
        //get category id  to store in Blogpost
        $cat = Blogcategory::where('categorys', '=', $request->input('blogcategory')['categorys'])->first();
        // Edit post in db
        $post = Blogpost::find($id);
        $post->subject = $request->input('subject');
        $post->body = $request->input('body');
        $post->url_friendly = $request->input('url_friendly');
        $post->meta_description = $request->input('meta_description');
        $post->ip = request()->ip();
        $post->blogcategory_id = $cat->id;
        $post ->blogtags()->sync($request->input('new_tags'));
        $post->save();

        $newPost = Blogpost::where('id', '=', $post->id)->first();

        return response()->JSON(array('messageReturned' => 'ok'));
    }

    /***************************************************************************
    ** comments  following is blog post comments, create, delete
    ***************************************************************************/

    public function storeComment(Request $request)
    {
        // first check if email in db
        $email_id = Email::where('email', '=', $request->input('email'))->first();
        //if not in db then add
        if ($email_id === null) {
            $storeEmail = new Email();
            $storeEmail->email = $request->input('email');
            $storeEmail->name = ucfirst(strtolower($request->input('name')));
            $storeEmail->ip = request()->ip();
            $storeEmail->save();
            $emailId =  $storeEmail->id;
        } else {
            $emailId = $email_id->id;
        }

        // add comment with email id
        $store = new Blogcomment();
        $store->comment = $request->input('comment');
        $store->blogpost_id = $request->input('pid');
        $store->email_id = $emailId;
        $store->ip = request()->ip();
        $store->save();

        // email me a comment was posted
        $body = "A comment was just posted on Dukesnuz blog\r";
        $body .= "Click the link to view and approve the comment.\r";
        $body .= config('app.url')."/blog/blog-post/".$request->input('pid')."/edit";
        $body .= "\rEMAIL END\r";
        $pdf = "";
        $data = array(
      'email' => config('constants.email_david_petringa'),
      'emailFrom' => config('constants.email_dukesnuz'),
      'subject' => "Comment Just Posted on Dukesnuz Blog",
      'body' => $body,
    );

        Mail::raw($data['body'], function ($message) use ($pdf, $data) {
            $message->to($data['email']);
            $message->from($data['emailFrom']);
            $message->subject($data['subject']);
            //$message->attachData($pdf->output(), $data['output']);
        });

        // email comment poster
        $body = ucfirst(strtolower($request->input('name')))."\r";
        $body .= "Thank you for leaving a comment on Dukesnuz blog.\r";
        $body .= "As soon as your comment is approved, then your comment will be live.\r";
        $body .= "You may view the blog post using the link below\r\r";
        $body .= config('app.url')."/blog/".$request->input('pid')."/blog";
        $body .= "\r\rThank you\r";
        $body .= "Duke\r";
        $body .= "EMAIL END\r";

        $pdf = "";
        $data = array(
      'email' => $request->input('email'),
      'emailFrom' => config('constants.email_dukesnuz'),
      'subject' => "Hey, Your Comment Was Received on Dukesnuz Blog",
      'body' => $body,
    );

        Mail::raw($data['body'], function ($message) use ($pdf, $data) {
            $message->to($data['email']);
            $message->from($data['emailFrom']);
            $message->subject($data['subject']);
            //$message->attachData($pdf->output(), $data['output']);
        });

        return response()->JSON(array('messageReturned' => 'ok'));
    }

    //get live comments for spcific blog post
    public function getLiveComments($id)
    {
        $comments = Blogcomment::where('blogpost_id', '=', $id)
    ->where('is_live', '=', 1)
    ->with('email')->orderBy('created_at', 'DESC')->get();
        return $comments;
    }

    //get all comments for spcific blog post
    public function getComments($id)
    {
        $comments = Blogcomment::where('blogpost_id', '=', $id)
    ->with('email')->orderBy('created_at', 'DESC')->get();
        return $comments;
    }

    // edit comment status, live or not live
    public function editCommentStatus($id, $status)
    {
        $editComment = Blogcomment::find($id);
        $editComment->is_live = ($status == 0)? 1 : 0;
        $editComment->save();

        return response()->JSON(array('messageReturned' => 'ok'));
    }

    // get search results
    public function show($term)
    {
        $tags = BlogTag::where('name', 'LIKE', '%'.$term.'%')->get();
        // return links found
        $urls = Blogpost::with('blogcategory')->with('blogtags')
        ->where([['subject', 'LIKE', '%'.$term.'%'], ['is_live', '=', '1']])
        ->orWhere([['body', 'LIKE', '%'.$term.'%'], ['is_live', '=', '1']])
        ->orWhere([['url_friendly', 'LIKE', '%'.$term.'%'], ['is_live', '=', '1']])
        ->orWhereHas('blogtags', function ($query) use ($term) {
            $query->where([['name', '=', $term], ['is_live', '=', '1']]);
        })
        ->orWhereHas('blogcategory', function ($query) use ($term) {
            $query->where([['categorys', '=', $term], ['is_live', '=', '1']]);
        })
        ->paginate(25);

        //add search term to search table
        $storeSearch = new Blogsearch();
        $storeSearch->term = $term;
        $storeSearch->ip = request()->ip();
        $storeSearch->save();

        //return collection of links as a resource
        return Post::collection($urls);
    }

    // get las x number of searches
    public function showAll()
    {
        $searches = Blogsearch::orderBy('created_at', 'desc')->take(15)->get();
        //  $searches = BlogSearch::take(15)->get();
        return BlogSearchResource::collection($searches);
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
