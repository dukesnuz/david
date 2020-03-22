@extends('layouts.master')

@include('includes.meta')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <td class="card-header">{{$title}}</td>
            </tr>
            <tr>
              <th><img width="600px" src="{{$url}}"></th>
            </tr>
          </table>
          <a href="{{ route('images-show') }}/">Return to images</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
