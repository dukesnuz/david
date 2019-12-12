@extends('layouts.master')

@section('title')
Create a Blog Post
@endsection

@section('content')
<div class="container">
  <div id="app">
        <create-blog-post/>
  </div>
</div>
@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection
