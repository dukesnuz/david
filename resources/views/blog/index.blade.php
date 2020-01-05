@extends('layouts.master')

@include('includes.meta')

@section('content')
<div class="container">
  <h4>Blog</h4>
  <div id="app">
        <blog-home></blog-home>
  </div>
</div>
@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection
