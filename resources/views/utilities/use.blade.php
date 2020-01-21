@extends('layouts.master')

@include('includes.meta')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <h1 class="font-weight-bold text-uppercase mt-5 mb-2">/uses</h1>
      <h3>A list of tools I use to develop webpages and whatever else I do.</h3>

      <h4 class="font-weight-bold text-uppercase mt-5 mb-2">Hardware</h4>
      <ul>
        <li><a href="https://amzn.to/2v3oyRP" target="blank"><span  class="text-primary">Acer Travelmate</span></a> laptop with 17 inch screen</li>
        <li><a href="https://amzn.to/2sIeZqJ" target="blank"><span  class="text-primary">Acer LED Technology</span></a> for a second monitor</li>
        <li>Yealink VOIP Phone with Vonnage for service</li>
        <li>Apple iphone 6</li>
      </ul>

      <h4 class="font-weight-bold text-uppercase mt-5 mb-2">Software</h4>
      <ul>
        <li>Atom for working with Laravel</li>
        <li>VS Code for working with Vue.js</li>
        <li>Postman when working with api</li>
        <li><a href="https://www.idrive.com/p=dukesnuz" target="blank"><span  class="text-primary">iDrive</span></a> to back up my computer</li>
        <li><a href="https://m.do.co/c/3ec7cdf44173" target="blank"><span  class="text-primary">Digital Ocean</span></a> for hosting my websites</li>
        <li>Firefox browser mostly used when developing</li>
        <li>Brave browser mostly used when not developing</li>
        <li>Chrome browser mostly for checking responsiveness on mobile devices</li>
      </ul>

      <h4 class="font-weight-bold text-uppercase mt-5 mb-2">Other Essentials</h4>
      <ul>
        <li><a href="https://amzn.to/2TIe2dh" target="blank"><span  class="text-primary">Ceramic cup</span></a> made in China used for cocoa and tea</li>
        <li><a href="https://amzn.to/2NK8kDP" target="blank"><span  class="text-primary">Note Pads</span></a> from office depot. USed for scribbling things down.</li>
        <li><a href="https://dukecannon.com/?rfsn=3315585.912b22" target="blank"><span  class="text-primary">Duke Cannon</span></a> for toiletries</li>
      </ul>

      <p class="mt-5">So you may be thinking, Where did you get the idea to make this page? Anwser == <a href="https://uses.tech/" target="blank"><span  class="text-primary">Wes Bos</span></a>

      </div>
    </div>
  </div>

  @endsection
