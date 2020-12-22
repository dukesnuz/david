@extends('layouts.master-album')

@include('includes.meta')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-6">
      <div class="card">
        <div class="card-header">Current Data</div>
        <div class="card-body">
          <ul class="list-group">
            <li class="list-group-item">Category: {{$categoryCurrent}}</li>
            <li class="list-group-item">Title: {{ $photo->title }}</li>
            <li class="list-group-item">Caption: {{ $photo->caption }}</li>
            <li class="list-group-item">Meta Desc: {{ $photo->meta_description }}</li>
            <li class="list-group-item">Url Friendly: {{ $photo->url_friendly }}</li>
            <li class="list-group-item">Photo Status: {{ ($photo->is_live)? "Photo is live" : "Photo not live" }}</li>
            <ul class="list-group">
              <li >Tags:
                @foreach($photo->phototags as $tag)
                <li class="list-group-item">{{ $tag->name }}</li>
                @endforeach
              </li>
            </ul>

          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card">
          <div class="card-header">Edit Picture Data</div>
          <div class="card-body">

            @if (session('success'))
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              {{session('success')}}
            </div>
            @endif

            <form action="{{ route('update-picture') }}" method="post">
              @csrf

              <input type="hidden" name="id" id="id" class="form-control" value="{{$photo['id']}}"></input>

              <div class="form-group">
                <label for="title">Title</label>
                <textarea name="title" id="caption" class="form-control">{{$photo['title']}}</textarea>
                <span class="help-block text-danger">{{$errors->first('title')}}</span>
              </div>

              <div class="form-group">
                <label for="caption">Caption</label>
                <textarea name="caption" id="caption" class="form-control">{{$photo['caption']}}</textarea>
                <span class="help-block text-danger">{{$errors->first('caption')}}</span>
              </div>

              @if($categorys !== '')
              <div class="form-group">
                <label for='category'>Select a category</label>
                <select name='category' id='category'>
                  <option value=''>&nbsp;</option>
                  @foreach($categorys as $category)
                  <option value='{{ $category->id }}' {{ ($categoryCurrent == $category->categorys ) ? 'selected' : '' }}>{{  $category->categorys  }}</option>
                  @endforeach
                </select>
                <span class="help-block text-danger">{{$errors->first('category')}}</span>
              </div>
              @endif

              <div class="form-group" style="margin-bottom:10px;">
                <span style="float:left;background-color:#ccc; margin-right:15px">
                  @foreach ($tags as $tag_id => $name)
                  <input
                  type='checkbox'
                  value='{{ $tag_id }}'
                  name='tags[]'
                  {{ (isset($tagsCurrent) and in_array($name, $tagsCurrent)) ? 'CHECKED' : '' }}
                  >
                  {{ $name }}</span>
                  @endforeach
                  <span class="help-block text-danger">{{$errors->first('tag')}}</span>
                </div>

                <div class="clearFix"</div>

                  <div class="form-group">
                    <label for="url_friendly">Url Friendly</label>
                    <input name="url_friendly" id="url_friendly" class="form-control" value="{{$photo['url_friendly']}}"></input>
                    <span class="help-block text-danger">{{$errors->first('url_friendly')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" class="form-control">{{$photo['meta_description']}}</textarea>
                    <span class="help-block text-danger">{{$errors->first('meta_description')}}</span>
                  </div>

                  <div class="form-group">
                    <div class="radio-inline">
                      <label for="true">
                        <input type="radio" id="true" name="is_live" value="1" {{($photo['is_live'])? 'CHECKED' : ''}} >Make Live</label>
                      </div>

                      <div class="radio-inline">
                        <label for="false">
                          <input type="radio" id="false" name="is_live" value="0" {{(!$photo['is_live'])? 'CHECKED' : ''}}  >Make Not Live</label>
                        </div>
                        <span class="help-block text-danger">{{$errors->first('is_live')}}</span>
                      </div>

                      <button class="btn btn-primary">Upload</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          @endsection

          @section('appjs')
          <script src="{{ asset('js/app.js')}}"></script>
          @endsection
