<!-- Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-4 mx-auto">

        <!-- Content -->
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
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-2 mx-auto">

              <!-- Links -->
              <!--    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>-->

              <ul class="list-unstyled">
                <li><a href="/links/get-list/">Home</a></li>
                <li><a href="/links/search/">Search</a></li>
                @if(Auth::check())
                <li><a href="/home">Login</a></li>
                <li><a href="/links/get-list/">View</a></li>
                <li><a href="/links/create/">Create</a></li>
                <li><a href="/links/create-categories/">Categories</a></li>
                <li><a href="/links/create-tags/">Tags</a></li>
                @endif
              </ul>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-2 mx-auto">

              <!-- Links -->
              <!--  <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>-->

              <ul class="list-unstyled">
                <li><a href="http://www.dukesnuz.com/" target="blank">DukesNuz</a></li>
                <li><a href='https://github.com/dukesnuz/david'><i class='fa fa-github' target="blank"></i>Code on GitHub</a></li>
                <li><a href="http://dukesnuz.com/contact/dukesnuz/david/petringa/" target="blank">Contact</a></li>
              </ul>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

          </div>
          <!-- Grid row -->

        </div>
        <!-- Footer Links -->


        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">&copy;&nbsp;{{ date('Y') }}:
          <a href="http://www.dukesnuz.com/"> David Petringa</a>
        </div>
        <!-- Copyright -->
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
          var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
          s1.async=true;
          s1.src='https://embed.tawk.to/561278e100d3af75029e428b/default';
          s1.charset='UTF-8';
          s1.setAttribute('crossorigin','*');
          s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
        <!--End of Tawk.to Script-->
      </footer>
      <!-- Footer -->
