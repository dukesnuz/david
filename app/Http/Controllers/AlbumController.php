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
    $tagsForCheckboxes = Phototag::getPhotoTagsForCheckboxes();
    $categorys = Photocategory::orderBy('categorys', 'ASC')->get(['id', 'categorys']);
    return view('album.create')->with([
      'title' => 'Create Picture',
      'description' => 'Upload a picture',
      'keywords' => 'album',
      'author' => 'David Petringa, Coded Decemeber 2020',
      'categorys' => Photocategory::getPhotocategorys(),
      'tags' => $tagsForCheckboxes,
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
//dd($request->meta_description);
   $path = Storage::disk('local')->put('file/photos', $request->file);

    $meta_description = ($request->meta_description == null)? $request->title ." ". $request->caption:$request->meta_description;
    $caption = ($request->caption == null)? Null: $request->caption;

   $request->merge([
     'size' => $request->file->getClientSize(),
     'path' => $path,
     'caption' => $caption,
     'category_id' => $request->category,
     'meta_description' => $meta_description,
     'url_friendly' => $request->title,
     'is_live' => 1,
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
