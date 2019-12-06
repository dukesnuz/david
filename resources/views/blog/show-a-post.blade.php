@extends('layouts.master-blog')

@section('title')
View A Blog Post
@endsection

@section('content')
<div class="container">

  @if(Auth::check())
  <p><a href="/blog/blog-post/{{$pid}}/edit">edit Post</a></p>
  @endif

  <div id="app">
    <show-a-blog-post pid={{$pid}}></show-a-blog-post>
  </div>
</div>
@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection
