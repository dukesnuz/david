@extends('layouts.master')

@section('title')
Create a Link
@endsection

@section('content')

<!--<h2>David's Famous Coding Links</h2>-->
<div class="flex-center position-ref full-height">
  <div class="content">

    <form method='POST' action='/links/url'>

      {{ csrf_field() }}
      <ul>
        <li><label>Subject:<label>
          <input type="text" id="subject" name="subject" value='{{ old('subject', '') }}'></li>
          <div class="error">@include('modules.error-field', ['fieldName' => 'subject'])</div>
          <li><label>Link:<label>
            <input type="text" id="link" name="link" value='{{ old('link', '') }}'></li>
            <div class="error">@include('modules.error-field', ['fieldName' => 'link'])</div>

            <li><label for='category_id'>* Category:</label>
              <select id='category_id' name='category_id'>
                @foreach($categoriesForDrop as $category_id => $name)

                <option value='{{ $category_id }}' {{ old('category_id') == $category_id ? 'SELECTED' : '' }}>
                  {{$name}}
                </option>
                @endforeach
              </select></li>
              <div class="error">@include('modules.error-field', ['fieldName' => 'category_id'])</div>

              <li><label>Description:<label>
                <input type="text" id="description" name="description" value='{{ old('description', '') }}'></li>
              <li><label>Tags: <label>
              @foreach($tagsForCheckBoxes as $tagId => $tagName)
                <input type='checkbox' value='{{ $tagId }}' name='tags[]'>
                {{ $tagName }}
              @endforeach
            </li>
                <li><input type="submit" value="Submit"></li>
              </ul>
            </form>

          </div>
        </div>

        @endsection
