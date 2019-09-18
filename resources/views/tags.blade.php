@extends('layouts.master')

@section('title')
David's Coding Tags
@endsection

@section('content')

<!--<h2>David's Famous Coding Links</h2>-->
<div class="flex-center position-ref full-height">
  <div class="content">

    <ul class="list-group m-5" style="margin-bottom:10px">
      <?php foreach ($tags as $key => $tag): ?>
        <li>{{ $tag->name }}</li>
      <?php endforeach; ?>
    </ul>

    <form method='POST' action='tag'>
      {{ csrf_field() }}
      <ul>
        <li><label>New Tag:<label>
          <input type="text" id="new_tag" name="new_tag" value='{{ old('new_tag', '') }}'></li>
          <div class="error">@include('modules.error-field', ['fieldName' => 'new_tag'])</div>
          <li><input type="submit" value="Submit"></li>
        </ul>
      </form>



    </div>
  </div>

  @endsection
