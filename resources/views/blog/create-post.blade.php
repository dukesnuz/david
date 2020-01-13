@extends('layouts.master')

@include('includes.meta')

@section('content')
  <div id="app">
        <create-blog-post/>
  </div>
@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection
