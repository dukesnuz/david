<!-- Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-2 mx-auto">

        <!-- Content -->

        <ul class="list-unstyled">
          <li><a href="/about/">About</a></li>
          <li><a href="http://dukesnuz.com/contact/dukesnuz/david/petringa/" target="blank">Contact</a></li>
          @if(Auth::check())
          <li><a href="/album/create/">Upload</a></li>
          @else
          <li><a href="/home">Login</a></li>
          @endif
        </ul>
      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 mx-auto">

      ------

      </div>

      <hr class="clearfix w-100 d-md-none">
      <!-- Grid column -->
      <div class="col-md-2 mx-auto">

        <!-- Links -->
        <!--    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>-->
        <div class="email-subscribe">
        ----------
          </div>
        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-2 mx-auto">


          <div class="soap">
            <p>
            -------
            </p>
          </div>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->


    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">&copy;&nbsp;{{ date('Y') }}
      <a href="http://www.davidpetringa.com/"> David Petringa</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
