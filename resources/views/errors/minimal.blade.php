<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Error')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .code {
                border-right: 2px solid;
                font-size: 26px;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="code">
                @yield('code')
            </div>

            <div class="message" style="padding: 10px;">
                @yield('message')
            </div>
        </div>
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
