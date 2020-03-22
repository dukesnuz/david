<?php

namespace David\Http\Controllers;

use David\File;
use David\Http\Requests\StoreFile;
use Illuminate\Support\Facades\Storage;
use App\Carbon;



class FileController extends Controller
{

  public function index()
  {
    return view('file.upload-file');
  }

  private $file;
  public function __construct(File $file)
  {
    $this->file = $file;
  }

  public function getFiles()
  {
    $files = File::all();
    return view('file/files')->with([
      'files' => $files, //auth()->user()->files,
      'title' => 'Images | Dukesnuz',
      'description' => 'An image using Laravel with aws s3 integration.',
      'keywords' => 'image',
      'author' => 'David Petringa, Coded March 2020'
    ]);
  }

  public function getAFile($id)
  {
    $file = File::find($id);

    $url = Storage::disk('s3')->temporaryUrl(
      $file->path, \carbon\carbon::now()->addMinutes(5)
    );
    return view('file/file')->with([
      'url'=> $url,
      'title' => $file->title,
      'description' => 'An image using Laravel with aws s3 integration.',
      'keywords' => 'image',
      'author' => 'David Petringa, Coded March 2020'
    ]);
  }

  public function postUpload(StoreFile $request)
  {
    $path = Storage::disk('s3')->put('files/originals', $request->file);
    //$path = 'dummy_path';
    $request->merge([
      'size' => $request->file->getClientSize(),
      'path' => $path
    ]);
    $this->file->create($request->only('path', 'title', 'size'));
    return back()->with('success', 'File Successfully Saved');
  }
}
