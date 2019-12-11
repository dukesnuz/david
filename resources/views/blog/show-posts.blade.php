@extends('layouts.master-blog')

@section('title')
View Blog Posts
@endsection

@section('content')
<div class="container">
  <div id="app">
    @if(Auth::check())
    <show-all-blog-posts/>
    @else
    <show-blog-posts/>
    @endif
  </div>
</div>
@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection
