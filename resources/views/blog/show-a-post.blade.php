@extends('layouts.master')

@include('includes.meta')

@section('content')
  @if(Auth::check())

  <p><a href="/blog/blog-post/{{$pid}}/edit" class="soap">Edit Post</a></p>
  <p>Meta Description: {{ $metaDescription }}</p>
  <p>Url Friendly: {{ $urlFriendly }}</p>
  @endif

  <div id="app">
    <show-a-blog-post pid={{$pid}}></show-a-blog-post>
  </div>
@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection
