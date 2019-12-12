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
          <li><a href="/links/get-list/">Favorite Links</a></li>
          <li><a href="/links/search/">Search Links</a></li>
          <li><a href="/blog/home/">Blog</a></li>
          <li><a href="/blog/show-blog-posts">Blog Posts</a></li>
          <li><a href="http://www.dukesnuz.com/" target="blank">DukesNuz</a></li>
          <li><a href='https://github.com/dukesnuz/david'><i class='fa fa-github' target="blank"></i>Code on GitHub</a></li>
          <li><a href="http://dukesnuz.com/contact/dukesnuz/david/petringa/" target="blank">Contact</a></li>
          @if(Auth::check())
          <li><a href="/links/get-list/">View Links</a></li>
          <li><a href="/links/create/">Create a Link</a></li>
          <li><a href="/links/create-categories/">Link Categories</a></li>
          <li><a href="/links/create-tags/">Link Tags</a></li>
          <li><a href="/blog/create/">Create a Blog Post</a></li>
          @else
          <li><a href="/home">Login</a></li>
          @endif
        </ul>
      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 mx-auto">

        <!-- Links -->
        <!--    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>-->
        <div class="email-subscribe">
          <h5>Subscribe to Duke's News Letter</h>
            <form action='/email-subscribe' method='POST'>
              <!--{{method_field('put')}}-->
              {{ csrf_field() }}
              <p><input type="text" name="name" placeholder="Enter your name" /></p>
              @include('modules.error-field', ['fieldName' => 'name'])
              <p><input type="email" name="email" placeholder="Enter your email" /></p>
              @include('modules.error-field', ['fieldName' => 'email'])
              <p><button type='submit'>Submit</button></p>
            </form>
          </div>
        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-2 mx-auto">

          <!-- Links -->
          <!--  <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>-->

          <div class="soap">
            <p>
              I recently discovered Duke Cannon
            </p>
            <p>
              <a href="https://dukecannon.com/?rfsn=3315585.912b22" target="blank">Check it out!</a>
            </p>
            <p>
              I like the Big Ass Beer Soap
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
