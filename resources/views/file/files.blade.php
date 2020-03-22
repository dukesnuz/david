@extends('layouts.master')

@include('includes.meta')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">All Images</div>
        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <th><small>Click image to enlarge</small></th>
              <th>Caption</th>
            </tr>
            @foreach ($files as $file)
            <tr>
              <td><a href="{{ route('image-show', ['id' => $file->id]) }}/" target="_blank"><img width="200px" src="{{$file->url}}"></a></td>
              <td>{{$file->title}}</td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
