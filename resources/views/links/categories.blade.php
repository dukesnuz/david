@extends('layouts.master')

@include('includes.meta')

@section('content')

<!--<h2>David's Famous Coding Links</h2>-->
<div class="flex-center position-ref full-height">
  <div class="content">

    <ul class="list-group m-5" style="margin-bottom:10px">
      <?php foreach ($categories as $key => $category): ?>
        <li>{{ $category->categories }}</li>
      <?php endforeach; ?>
    </ul>

    <form method='POST' action='/links/category'>
      {{ csrf_field() }}
      <ul>
        <li><label>New Category:<label>
          <input type="text" id="new_category" name="new_category" value='{{ old('new_category', '') }}'></li>
          <div class="error">@include('modules.error-field', ['fieldName' => 'new_category'])</div>
          <li><input type="submit" value="Submit"></li>
        </ul>
      </form>

    </div>
  </div>

  @endsection
