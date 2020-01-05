@extends('layouts.master')

@include('includes.meta')

@section('content')

<div class="flex-center position-ref full-height">
  <div class="content">

    <form method='POST' action='/links/update-url/{{$url->id}}'>
      <div class="form-group">
        {{ csrf_field() }}
        <label>Category: <label>
          <select name="category">
            <?php foreach ($categories_for_drop as $category_id => $category_name): ?>
              <option value='{{ $category_id }}' {{ $category_for_this_link == $category_name ? 'SELECTED' : '' }}>
                {{ $category_name }}
              </option>
            <?php endforeach; ?>
          </select>

          <div class="error">@include('modules.error-field', ['fieldName' => 'category'])</div>
        </div>
        <div class="form-group">
          <label>Subject:<label>
            <input type="text" class="form-control"  id="subject" name="subject" value='{{ old('subject', $url->subject) }}'>
            <div class="error">@include('modules.error-field', ['fieldName' => 'subject'])</div>
          </div>
          <div class="form-group">
            <label>Link:<label>
              <input type="text" class="form-control"  id="link" name="link" value='{{ old('link', $url->link) }}'>
              <div class="error">@include('modules.error-field', ['fieldName' => 'link'])</div>
            </div>
            <div class="form-group">
              <label>Description:<label>
                <textarea  class="form-control" cols="50" rows="5" type="text" id="description" name="description">
                  {{ old('description', $url->description) }}
                </textarea>
              </div>
              <div class="form-group">
                <label>Tags: <label>
                  @foreach($tags_for_checkbox as $tag_id => $tag_name)
                  <input  type='checkbox' value='{{ $tag_id }}'
                  name='tags[]' {{ (in_array($tag_name, $tags_for_this_link))? 'CHECKED' : '' }}>
                  {{ $tag_name }}
                  @endforeach

                </div>
                <button type="submit"  class="btn btn-dark btn-block">Submit</button>

              </form>

            </div>
          </div>

          @endsection
