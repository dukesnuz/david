@extends('layouts.master')

@section('title')
  David's Coding Links
@endsection

@section('content')

<!--<h2>David's Famous Coding Links</h2>-->
  <div class="flex-center position-ref full-height">
    <div class="content">
      <ul class="list-group m-5" style="margin-bottom:250px">
        <?php foreach ($urls as $key => $url): ?>
          <li class="list-group-item-action">CATEGORY: {{ $url->category->categories }}</li>
          <li class="list-group-item-action">{{ $url->subject }}</li>
          <li class="list-group-item list-group-item-action list-group-item-success"><a href="{{ $url->link }}">Read More</a></li>
          <li class="list-group-item m-5 bg-secondary text-warning">{{ $url->description }}</li>
          <li><ul class="list-inline">Tags:
          <?php foreach ($url->tags as $key => $tag): ?>
          <li class="list-inline-item"><?php  echo $tag->name; ?></li>
          <?php endforeach; ?>
        </ul></li>
        <li class="list-group-item-action"><a href="/links/edit/{{ $url->id }}">Edit</a></li>
        <?php endforeach; ?>
      </ul>

    </div>
  </div>

  @endsection
