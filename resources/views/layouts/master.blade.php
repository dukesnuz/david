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

  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>

  @stack('head')

</head>
<body>
  <div class="content">
    <header>
      <h1 class="text-primary">null</h1>
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

    <section id='main'>
      @yield('content')
    </section>

    <footer>
      <a href='https://github.com/dukesnuz/david'><i class='fa fa-github'></i></a>&nbsp;
      &copy; {{ date('Y') }}
    </footer>

    @stack('body')

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
    </div>
  </body>
  </html>
