
<!DOCTYPE html>

  <html lang="{{ config('app.locale') }}">
  
  <head>

    @include('partials._head')
  
  </head>

  <?php
    $bg = array('footer_1.jpg', 'footer_2.jpg', 'footer_3.jpg', 'footer_4.jpg', 'footer_5.jpg', 'footer_6.jpg', 'footer_7.jpg' ); 
    $i = rand(0, count($bg)-1);
    $selectedBg = "$bg[$i]";
  ?>
  <style type="text/css">
    .footer_outer{
      background: url(/img/<?php echo $selectedBg; ?>) no-repeat;
      background-color: #333;
      background-size: cover;
    }
  </style>
  <body>

<div class="containerr">

    @include('partials._nav')

      <div class="content-wrap">
        
        <div class="content">

          <div class="container">
              
              @include('partials._messages')

              @yield('content')

          </div> <!-- end of container -->



          <div class="newsletter">
            
              @include('partials._newsletter')

          </div>

          <div class="social_media">
            
              @include('partials._social')

          </div>

          <div class="footer_outer">

            @include('partials._footer')

          </div>

          <div class="copy">

            <div class="text-center">

              Copyright Metr4u - All Rights Reserved

            </div>

          </div>


        </div><!-- /content -->
  
      </div><!-- /content-wrap -->

    </div><!-- /containerr -->

    @include('partials._javascript')

    @yield('scripts')

  </body>

</html>