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
       <search></search>
      </div>
    </div>
  </div>
</div>

@endsection
