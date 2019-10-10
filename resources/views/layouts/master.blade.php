<!DOCTYPE html>
<html>
<head>
  <title>
    @yield('title', 'David.Dukesnuz')
  </title>

  <meta charset='utf-8'>
  <meta name="description" content="This page is a list of coding and website turorials which I use and find useful in developing websites.">
  <meta name="keywords" content="coding, website, developemnt, Laravel, html, css, php, mysql, frameworks, angular, vue.js">
  <meta name="author" content="David Petringa, Coded September 2019">
  <meta name="viewport" content="width=device-width; initial-scale=1.0">
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @stack('head')

</head>
<body>
  <header>
    <h1 class="text-primary"><a href="/">David's Laravel App</a></h1>
    @if(Auth::check())
    <ul class="list-inline">
      <li class="list-inline-item"><a href="/home">Home</a></li>
      <li class="list-inline-item"><a href="/links/get-list">View</a></li>
      <li class="list-inline-item"><a href="/links/create">Create</a></li>
      <li class="list-inline-item"><a href="/links/create-categories">Categories</a></li>
      <li class="list-inline-item"><a href="/links/create-tags">Tags</a></li>
    </ul>
    @endif
  </header>
  @if(session('alert'))
  <div class='alert'>
    {{ session('alert') }}
  </div>
  @endif

  <main class="py-4">
    <div id="app">
     <search></search>
    </div>
    @yield('content')
  </main>

  <footer class="h-25">
    <ul class="list-inline">
      <li class="list-inline-item"><a href="/">Home</a></li>
      <li><a href='https://github.com/dukesnuz/david'><i class='fa fa-github'></i>Code on GitHub</a></li>
      <li>Coding and content by David Petringa: &copy;&nbsp;{{ date('Y') }}</li>
    </ul>
  </footer>

  @stack('body')

<script src="{{ asset('js/app.js')}}"></script>

  <!-- Default Statcounter code for david.dukesnuz.com
  http://david.dukesnuz.com/ -->
  <script type="text/javascript">
  var sc_project=12099896;
  var sc_invisible=1;
  var sc_security="2987e810";
  </script>
  <script type="text/javascript"
  src="https://www.statcounter.com/counter/counter.js"
  async></script>
  <noscript><div class="statcounter"><a title="Web Analytics"
    href="https://statcounter.com/" target="_blank"><img
    class="statcounter"
    src="https://c.statcounter.com/12099896/0/2987e810/1/"
    alt="Web Analytics"></a></div></noscript>
    <!-- End of Statcounter Code -->
  </body>
  </html>
