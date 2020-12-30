@extends('layouts.master-album')

@include('includes.meta')

@section('content')


<h1>{{ $photo->title }}</h1>
<img src="{{url($photo->path)}}" height=100 width=50>

<ul>
<li>Caption: {{ $photo->caption }}</li>
<li>Category: {{ ucfirst($categoryCurrent) }}</li>
<li>Tags:
<?php foreach ($tagsCurrent as $key => $value): ?>
  <?php echo $value; ?>
<?php endforeach; ?>
</li>
</ul>

  <div id="app">
      <photo-comment id={{$id}} username={{$userName}} userid={{$userId}}></photo-comment>
  </div>
@endsection

@section('appjs')
<script src="{{ asset('js/app.js')}}"></script>
@endsection
