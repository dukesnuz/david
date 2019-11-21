@extends('layouts.master')

@section('title')
David's Favorite Websites
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <h5 class="font-weight-bold text-uppercase mt-3 mb-4">About</h5>
      <p>The goal of this web application is to organize websites I find useful. I have each website list in a catgory.
        Each link also may have tags associated with the link. I have included brief descriptions with each link. As a result
        for my passion to write code for both front end and backend web development, there are many links relating to website development.
        Please forgive my styling. I just used some simple bootstrap styles.</p>

        <p>Oh and this app was built using the
          <a href="https://laravel.com/" taget="blank">Laravel
            Framework</a>. The search page uses <a href="https://vuejs.org/" target="blank">Vue.js</a>. My two editors are
            <a href="https://atom.io/" target="blank">Atom</a>
            when writing Laravel code and <a href="https://code.visualstudio.com/" target="blank">Visual Studio Code</a> when
            writing Vuejs.js code. Also learned some knew coding techniques from
            <a href="https://www.traversymedia.com/" target="blank">Traversy Media</a>,
            <a href="https://www.youtube.com/watch?v=4pc6cgisbKE" target="blank">Laravel 5.5 API From Scratch Using Resources</a>
            and
            <a href="https://www.youtube.com/watch?v=DJ6PD_jBtU0&t=1027s" target="blank">Full Stack Vue.js & Laravel</a>.
            I created this project in October of 2019.</p>
          </div>
        </div>
      </div>

      @endsection
