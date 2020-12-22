@extends('layouts.master-album')

@include('includes.meta')

@section('content')

<div class="container">
  <div class="row justify-content-center" style="float:left;width:inherit;">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Upload New Picture</div>
        <div class="card-body">

          @if (session('success'))
          <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session('success')}}
          </div>
          @endif

          <form action="{{ route('upload-picture') }}" enctype="multipart/form-data" method="post">
            @csrf

            <div class="form-group">
              <input type="file" name="file" id="">
              <span class="help-block text-danger">{{$errors->first('file')}}</span>
            </div>

            <div class="form-group">
              <label for="title">Title</label>
              <textarea name="title" id="caption" class="form-control" value=""></textarea>
              <span class="help-block text-danger">{{$errors->first('title')}}</span>
            </div>

            <div class="form-group">
              <label for="caption">Caption</label>
              <textarea name="caption" id="caption" class="form-control" value=''></textarea>
              <span class="help-block text-danger">{{$errors->first('caption')}}</span>
            </div>


            @if($categorys !== '')
            <div class="form-group">
              <label for='category'>Select a category</label>
              <select name='category' id='category'>
                <option value=''>&nbsp;</option>
                @foreach($categorys as $category)
                <option value='{{ $category->id }}' {{ (old('category') == $category->categorys)? 'selected' : '' }}>{{ $category->categorys }}</option>
                @endforeach
              </select>
              <span class="help-block text-danger">{{$errors->first('category')}}</span>
            </div>
            @endif

            <div class="form-group" style="margin-bottom:100px;">
              @foreach($tags as $tag_id => $name)
              <span style="float:left;background-color:#ccc; margin-right:15px">  <input
                type='checkbox'
                value='{{ $tag_id }}'
                name='tags[]'
                >
                {{ $name }} </span>
                @endforeach
                <span class="help-block text-danger">{{$errors->first('tag')}}</span>
              </div>

              <div class="clearFix"</div>

                <div class="form-group">
                  <label for="url_friendly">Url Friendly</label>
                  <input name="url_friendly" id="url_friendly" class="form-control" value=""></input>
                  <span class="help-block text-danger">{{$errors->first('url_friendly')}}</span>
                </div>

                <div class="form-group">
                  <label for="meta_description">Meta Description</label>
                  <textarea name="meta_description" id="meta_description" class="form-control" value=""></textarea>
                  <span class="help-block text-danger">{{$errors->first('meta_description')}}</span>
                </div>

                <button class="btn btn-primary">Upload</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="app">
      <photo-create/>
    </div>
    <div class="clearFix"></div>
    @endsection

    @section('appjs')
    <script src="{{ asset('js/app.js')}}"></script>
    @endsection
