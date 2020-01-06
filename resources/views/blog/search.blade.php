@extends('layouts.master')

@include('includes.meta')

@section('content')
<div class="container">
  <div id="app">
    <div class="row">
      <div class="col-md-3" style="word-wrap:break-word;">
        <searches-blog></searches-blog>
      </div>
      <div class="col-md-9">
        <search-blog show_edit={{Auth::check()}}></search-blog>
      </div>
    </div>
  </div>
</div>
@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection
