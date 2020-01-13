@extends('layouts.master')

@include('includes.meta')

@section('content')
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
@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection
