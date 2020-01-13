@extends('layouts.master')

@include('includes.meta')

@section('content')

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        @if(isset($url))

          <div class="bg-dark text-white" style="margin:25px">
            <div class="card-header">
              <h3><a href="{{ $url->subject }}">{{ $url->subject }}</a></h3>
            </div>
            <div class="card-body">
              <p>Category:<a href="/links/category/{{ $url->category->categories }}"> {{ $url->category->categories }} </a></p>
              <p>Description: {{ $url->description }}</p>
              <p><a href="{{ $url->link }}"class="btn btn-success">Read More</a></p>

              <ul class="list-inline">
                <li class="list-inline-item">Tags:</li>
                <?php foreach ($url->tags as $key => $tag): ?>
                  <li class="list-inline-item"><a href="/links/tag/<?php  echo $tag->name; ?>"><?php  echo $tag->name; ?></a></li>
                <?php endforeach; ?>
              </ul>
              @if(Auth::check())
              <p><a href="/links/edit/{{ $url->id }}" class="btn btn-primary">Edit</a></p>
              @endif
            </div>
          </div>

        @else

        <h3 class="alert-danger">OOOpppsss! Something has gone haywire! Page Error!</h3>

        @endif
      </div>
    </div>
  </div>

@endsection
