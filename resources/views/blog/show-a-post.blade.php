@extends('layouts.master-blog')

@section('title')
View A Blog Post
@endsection

@section('content')
<div class="container">

  <p><a href="/blog-post/{{$pid}}/edit">edit Post</a></p>

  <div id="app">
    <show-a-blog-post pid={{$pid}}></show-a-blog-post>
  </div>
</div>
@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection