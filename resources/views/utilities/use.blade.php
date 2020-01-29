@extends('layouts.master')

@include('includes.meta')

@section('content')

  <div id="app">
      <uses></uses>
  </div>

@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection
