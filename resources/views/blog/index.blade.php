@extends('layouts.master')

@include('includes.meta')

@section('content')
  <div id="app">
        <blog-home></blog-home>
  </div>
@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection
