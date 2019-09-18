@extends('layouts.master')

@section('title')
Edit a Link
@endsection

@section('content')

<!--<h2>David's Famous Coding Links</h2>-->
<div class="flex-center position-ref full-height">
  <div class="content">

    <form method='POST' action='/update-url/{{$url->id}}'>

      {{ csrf_field() }}
      <ul>
        <li><label>Subject:<label>
          <input type="text" id="subject" name="subject" value='{{ old('subject', $url->subject) }}'></li>
          <div class="error">@include('modules.error-field', ['fieldName' => 'subject'])</div>


          <li><label>Link:<label>
            <input type="text" id="link" name="link" value='{{ old('link', $url->link) }}'></li>
            <div class="error">@include('modules.error-field', ['fieldName' => 'link'])</div>

            <li><label>Description:<label>
              <input type="text" id="description" name="description" value='{{ old('description', $url->description) }}'></li>

              <li><label>Tags: <label>
                @foreach($tags_for_checkbox as $tag_id => $tag_name)
                <input type='checkbox' value='{{ $tag_id }}'
                name='tags[]' {{ (in_array($tag_name, $tags_for_this_link))? 'CHECKED' : '' }}>
                {{ $tag_name }}
                @endforeach
              </li>

              <li><input type="submit" value="Submit"></li>
            </ul>
          </form>

        </div>
      </div>

      @endsection
