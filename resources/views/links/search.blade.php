@extends('layouts.master')

@section('title')
Search - DukesNuz
@endsection

@section('content')
<div class="container">
  <div id="app">
    <div class="row">
      <div class="col-md-3" style="word-wrap:break-word;">
        <searches></searches>
      </div>
      <div class="col-md-9">
        <search show_edit={{Auth::check()}}></search>
      </div>
    </div>
  </div>
</div>
@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection
