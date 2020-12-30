@extends('layouts.master-album')

@include('includes.meta')

@section('content')
  <div id="app">
    <index id={{$id}}></index>
  </div>
@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection
