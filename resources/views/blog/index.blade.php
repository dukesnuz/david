@extends('layouts.master-blog')

@section('title')
David's Blog
@endsection

@section('content')
<div class="container">
  <div id="app">
        <blog-home></blog-home>
  </div>
</div>
@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection
