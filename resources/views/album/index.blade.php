@extends('layouts.master-album')

@include('includes.meta')

@section('content')
  <div id="app">
    <Index></Index>
  </div>
@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection
