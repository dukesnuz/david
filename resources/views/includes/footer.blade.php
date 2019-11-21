<!-- Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-4 mx-auto">

        <!-- Content -->

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
        <!--    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>-->


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
