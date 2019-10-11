@extends('layouts.master')

@section('title')
Search - DukesNuz
@endsection

@section('content')
<h2><a href="/links/get-list">Favorite Links</a></h2>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div id="app">
        <search show_edit={{Auth::check()}}></search>
      </div>
    </div>
  </div>
</div>

@endsection

@section('appjs')
  <script src="{{ asset('js/app.js')}}"></script>
@endsection
