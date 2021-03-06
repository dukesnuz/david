@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          You are logged in!
        </div>

        <div class="card-footer">
          <ul>
          <li><a href="/links/get-list">David's favorite websites</a></li>
          <li><a href="/blog/home">David's Blog</a></li>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
