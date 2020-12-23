<?php

namespace David\Http\Controllers;

use Illuminate\Http\Request;
use David\Http\Requests\StorePhoto;
use Illuminate\Support\Facades\Storage;
use David\Photocategory;
use David\Phototag;
use David\Carbon;
use David\Photo;
use David\Album;

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
    return view('album.index')->with([
      'title' => 'Photo Album',
      'description' => 'A photo album of pictures of family and friends',
      'keywords' => 'pictures, family, friends',
      'author' => 'David Petringa, Coded December 2020'
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
    $path = Storage::disk('local')->put('file/photos', $request->file);

    $meta_description = ($request->meta_description !== null)? $request->meta_description:$request->title ." ". $request->caption;
    $caption = ($request->caption !== null)? $request->caption:Null;
    $url_friendly = ($request->url_friendly !== null)? $request->url_friendly : $request->title;

    $request->merge([
      'size' => $request->file->getClientSize(),
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
    //
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
}
