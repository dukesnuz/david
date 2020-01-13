@extends('layouts.master')

@include('includes.meta')

@section('content')
  <div id="app">
    @if(Auth::check())
    <show-all-blog-posts/>
    @else
    <show-blog-posts/>
    @endif
  </div>
@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection
