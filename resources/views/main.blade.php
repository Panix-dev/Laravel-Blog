
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


@php
  if (Route::getCurrentRoute()->uri() == '/')
  {
@endphp

<div class="fluid_container home_slider">
    <div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4">
        <div data-src="/img/slides/front_banner_1.jpg">
          <div class="fadeIn camera_effected">
            <h2>Some title goes here!</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </div>
        <div data-src="/img/slides/front_banner_2.jpg">
          <div class="fadeIn camera_effected">
            <h2>Some title goes here!</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </div>
        <div data-src="/img/slides/front_banner_3.jpg">
          <div class="fadeIn camera_effected">
            <h2>Some title goes here!</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </div>
    </div><!-- #camera_wrap_3 -->
    <!-- <div class="scroll-down-indication"></div> -->
    <button class="trigger pulse-down" data-info="">
    <div class="mouse">
       <div class="wheel"></div>
    </div>
    <div class="mouseArrows"><span class="unu"></span> <span class="doi"></span> </div>
  </button>
</div><!-- .fluid_container -->

@php
  }
@endphp


@php
  if (Route::getCurrentRoute()->uri() == '/')
  {
@endphp
          <div class="home_container">
              
              @include('partials._messages')

              @yield('content')

          </div> <!-- end of container -->
@php
  } else {
@endphp   
              
          @include('partials._messages')

          @yield('content')

@php 
  }
@endphp


          <div class="newsletter">
              <div class="newsletter_intro">
                Πραγματοποιήστε την εγγραφή σας στο <strong>newsletter του metr4u.gr</strong> για να λαμβάνετε πρώτοι ενημερώσεις σχετικά με προσφορές που προσφέρουν τα μαγαζιά, απευθείας στο <strong>email σας!</strong>
              </div>

              @include('partials._newsletter')

          </div>

          <div class="social_media">
            
              @include('partials._social')

          </div>

          <div class="footer_outer">
          
            <div class="container">

              @include('partials._footer')
              
            </div>

          </div>

          <div class="copy">

            <div class="text-center">

              Copyright Metr4u - All Rights Reserved

            </div>

          </div>


        </div><!-- /content -->
  
      </div><!-- /content-wrap -->

    </div><!-- /containerr -->

    <div class="hi-icon-wrap hi-icon-effect-9 hi-icon-effect-9b go_to_top">
      <span class="hi-icon"><i class="fa fa-angle-up" aria-hidden="true"></i></span>
    </div>

    @include('partials._javascript')

    @yield('scripts')

  </body>

</html>