@extends('layouts.master-blog')

@section('title')
View A Blog Post
@endsection

@section('content')
<div class="container">
  <div id="app">
    <show-a-blog-post pid={{$pid}}></show-a-blog-post>
  </div>
</div>
@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection
