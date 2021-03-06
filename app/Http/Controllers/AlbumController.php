<?php

namespace David\Http\Controllers;

use Illuminate\Http\Request;
use David\Http\Requests\StorePhoto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use David\Photocategory;
use David\Phototag;
use David\Carbon;
use David\Photo;
use David\Album;
use David\Photofavorite;
use David\Photocomment;

class AlbumController extends Controller
{

  private $photo;
  public function __construct(Photo $photo)
  {
    $this->photo = $photo;
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $id = 0;
    //there is a user logged in, now to get the id
    if (Auth::check()) {
       $id = auth()->user()->id;
    }

    return view('album.index')->with([
      'title' => 'Photo Album',
      'description' => 'A photo album of pictures of family and friends',
      'keywords' => 'pictures, family, friends',
      'author' => 'David Petringa, Coded December 2020',
      'id' => $id,
    ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('album.create')->with([
      'title' => 'Create Picture',
      'description' => 'Upload a picture',
      'keywords' => 'album',
      'author' => 'David Petringa, Coded Decemeber 2020',
      'categorys' => Photocategory::getPhotocategorys(),
      'tags' => Phototag::getPhotoTagsForCheckboxes(),
    ]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(StorePhoto $request)
  {
    //dd($request->toArray());
    if($request->file->getSize() > 999999) {
      return back()->with('success', 'Photo is too large');
    }

    $path = Storage::disk('public')->put('images', $request->file);

    $meta_description = ($request->meta_description !== null)? $request->meta_description:$request->title ." ". $request->caption;
    $caption = ($request->caption !== null)? $request->caption:Null;
    $url_friendly = ($request->url_friendly !== null)? $request->url_friendly : $request->title;

    $request->merge([
      //'size' => $request->file->getClientSize(),
      'size' => $request->file->getSize(),
      'path' => $path,
      'caption' => $caption,
      'category_id' => $request->category,
      'meta_description' => $meta_description,
      'url_friendly' => $url_friendly,
      'is_live' => \Auth::id(),
      'ip' => request()->ip(),
    ]);
    // add to db
    $this->photo->create($request->only('path', 'title', 'caption', 'category_id', 'meta_description', 'url_friendly', 'is_live', 'ip',
    'size'))->phototags()->sync($request->input('tags'));

    return back()->with('success', 'Photo Successfully Saved');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //dd(Photo::getCategory($id));
    $photo = Photo::with('Phototags')
    ->where('id', '=', $id)
    ->first();
    //$user = auth()->user();
    //dd(auth()->user()->id);
    //dd($photo[0]['Phototags'][0]->toArray());
    $newCurrentTags =  array();
    foreach ($photo['Phototags']->toArray() as $key => $value) {
      array_push($newCurrentTags, $value['name']);
    }
    $photo->path = "storage/".$photo->path;
    //dd($photo);
    return view('album.show-photo')->with([
      'id' => $id,
      'title' => 'Show Picture',
      'description' => 'Show a picture and data',
      'keywords' => 'album',
      'author' => 'David Petringa, Coded Decemeber 2020',
      //'categorys' => Photocategory::getPhotocategorys(),
      //  'tags' => Phototag::getPhotoTagsForCheckboxes(),
      'photo' => $photo,
      'tagsCurrent' => $newCurrentTags, //$photo[0]['Phototags'][0]->toArray(),
      'categoryCurrent'=> Photo::getCategory($id),
      'userName' => auth()->user()->name,
      'userId' => auth()->user()->id,
    ]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //dd(Photo::getCategory($id));
    $photo = Photo::with('Phototags')
    ->where('id', '=', $id)
    ->get();
    //dd($photo[0]['Phototags'][0]->toArray());
    $newCurrentTags =  array();
    foreach ($photo[0]['Phototags']->toArray() as $key => $value) {
      array_push($newCurrentTags, $value['name']);
    }
    return view('album.edit')->with([
      'title' => 'Edit Picture',
      'description' => 'Edit a picture and data',
      'keywords' => 'album',
      'author' => 'David Petringa, Coded Decemeber 2020',
      'categorys' => Photocategory::getPhotocategorys(),
      'tags' => Phototag::getPhotoTagsForCheckboxes(),
      'photo' => $photo[0],
      'tagsCurrent' => $newCurrentTags, //$photo[0]['Phototags'][0]->toArray(),
      'categoryCurrent'=> Photo::getCategory($id),
    ]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(StorePhoto $request)
  {
    //dd($request->toArray());
    $meta_description = ($request->meta_description !== null)? $request->meta_description:$request->title ." ". $request->caption;
    $caption = ($request->caption !== null)? $request->caption:Null;
    $url_friendly = ($request->url_friendly !== null)? $request->url_friendly : $request->title;

    $request->merge([
      'caption' => $request->caption,
      'category_id' => $request->category,
      'meta_description' => $request->meta_description,
      'url_friendly' => $url_friendly,
      'is_live' => $request->is_live,
      'ip' => request()->ip(),
    ]);
    // add to db
    # If there were tags selected...

    $edit = Photo::find($request->id);
    $edit->title = $request->title;
    $edit->category_id = $request->category_id;
    $edit->caption = $caption;
    $edit->meta_description = $meta_description;
    $edit->url_friendly = $request->title;
    $edit->is_live = $request->is_live;
    $edit->ip = request()->ip();
    if($request->tags) {
      $tags = $request->tags;
      $edit->Phototags()->sync($tags);
    } else {
      $edit->Phototags()->detach();
    }
    $edit->save();

    return back()->with('success', 'Photo Data Successfully Saved');
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

  public function storeCategory(Request $request)
  {
    // Store new category in db
    $store = new Photocategory();
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
    $store = new Phototag();
    $store->name = ucfirst(strtolower($request->input('name')));
    $store->save();
    return response()->JSON(array('messageReturned' => 'ok'));
  }

  // get all photos, first check if user has favorites
  public function showAllPhotos($id)
  {
    $favorites = Photofavorite::showUserFavorites($id);
    // check if user has favorites
    if(empty($favorites)) {
      $photos = Photo::where('is_live', '=', 1)->get();
      foreach ($photos as $key => $v) {
        $v['path'] = 'storage/'.$v['path'];
      }
      return response()->JSON(array('messageReturned' => 'ok', 'photos' => $photos->toArray()));
    } else {
      return response()->JSON(array('messageReturned' => 'ok', 'photos' => $favorites));
    }
  }

  // store a comment for a photo
  public function storeComment(Request $request)
  {
    //dd($request->toArray());
    // Store new category in db
    $store = new Photocomment();
    $store->comment = $request->input('comment');
    $store->user_id = $request->input('userId');
    $store->photo_id = $request->input('photoId');
    $store->is_live = 1;
    $store->ip = request()->ip();
    $store->save();

    if($store !== "" || $store !== null) {
      return response()->JSON(array('messageReturned' => 'ok'));
    } else {
      return response()->JSON(array('messageReturned' => 'error'));
    }
  }

  // show comments for a photo
  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function showComments($id)
  {
      $comments = \DB::select( \DB::raw("
      SELECT Photocomments.comment, DATE_FORMAT(Photocomments.created_at, '%M %D %Y') AS Date, Users.name
      FROM Photocomments
      INNER JOIN Users ON Users.id = Photocomments.user_id
      WHERE
      Photocomments.is_live = 1
      And
      Photo_id = '$id'
      ORDER BY Photocomments.created_at DESC
      ") );
    //dd($comments);
    if(!empty($comments)){
      return response()->JSON(array('messageReturned' => 'ok', 'comments' => $comments));
    } else {
      return response()->JSON(array('messageReturned' => 'no_comments', 'comments' => ""));
    }

  }

}
