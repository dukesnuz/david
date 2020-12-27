@extends('layouts.master-album')

@include('includes.meta')

@section('content')
<!--
<img src="{{ asset("storage/images/5FDv1llWeC9oE4SezA78U6hJDgrHvv9lgOG9cvcI.jpeg") }}">
-->
<br>

-----------------------
  <div id="app">
    <index id={{$id}}></index>
  </div>
@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection
