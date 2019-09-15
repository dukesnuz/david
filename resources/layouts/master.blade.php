<!DOCTYPE html>
<html>
<head>
  <title>
    @yield('title', 'Foobooks')
  </title>

  <meta charset='utf-8'>

  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
  <link href="/css/foobooks.css" type='text/css' rel='stylesheet'>

  @stack('head')

</head>
<body>

  @if(session('alert'))
  <div class='alert'>
    {{ session('alert') }}
  </div>
  @endif

  <header>

    </header>
here

<section id='main'>
  @yield('content')
</section>


    <footer>
      <a href='https://github.com/dukesnuz/foobooks'><i class='fa fa-github'></i></a>&nbsp;
      &copy; {{ date('Y') }}
    </footer>

    @stack('body')

    </body>
    </html>
