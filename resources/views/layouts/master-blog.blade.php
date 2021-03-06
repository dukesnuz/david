<!DOCTYPE html>
<html>
<head>
  <title>
    @yield('title', 'David.Dukesnuz')
  </title>

  <meta charset='utf-8'>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="David Petringa, Coded November 2019">
  <meta name="viewport" content="width=device-width; initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!-- Styles -->
  <link rel='stylesheet' href='http://www.dukesnuz.com/css_libs/dukes_normalize.css'>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
  @stack('head')

</head>
<body>
  <header>

    <h1 class="text-primary"><a href="/blog/home/">Blog For DukesNuz</a></h1>

    <ul class="list-inline">
      <li class="list-inline-item"><a href="/">Home</a></li>
      <li class="list-inline-item"><a href="/blog/home/">Blog</a></li>
      <li class="list-inline-item"><a href="/blog/show-blog-posts/">Blog Posts</a></li>
      <li class="list-inline-item"><a href="/about/">About</a></li>
      @if(Auth::check())
      <li class="list-inline-item"><a href="/blog/create/">Create Post</a></li>
      @endif
    </ul>
  </header>
  @if(session('alert'))
  <div class='alert'>
    {{ session('alert') }}
  </div>
  @endif

  <main class="py-4">
    <!-- add most popular searches on side bar
    maybe add some catgories on side bar-->
    @yield('content')
  </main>

  @include('includes.footer')

  @stack('body')

  @yield('appjs')

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
