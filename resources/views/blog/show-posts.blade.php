@extends('layouts.master-blog')

@section('title')
View Blog Posts
@endsection

@section('content')
<div class="container">
  <div id="app">
    <show-blog-posts/>
  </div>
</div>
@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection
