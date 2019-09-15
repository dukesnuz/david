@extends('layouts.master')


@section('title')
    New book
@endsection

@section('content')

  <div class="flex-center position-ref full-height">
    <div class="content">
      <ul class="list-group">
        @<?php foreach ($urls as $key => $url): ?>
          <li class="list-group-item">{{ $url->subject }}</li>
          <li class="list-group-item"><a href="{{ $url->link }}">Read More</a></li>
          <li class="list-group-item">{{ $url->description }}</li>
        <?php endforeach; ?>
      </ul>

    </div>
  </div>

  @endsection
