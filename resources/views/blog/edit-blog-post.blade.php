@extends('layouts.master-blog')

@section('title')
Edit a Blog Post
@endsection

@section('content')
<div class="container">
  <div id="app">
        <edit-blog-post pid={{$pid}}></edit-blog-post>
  </div>
</div>
@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection
