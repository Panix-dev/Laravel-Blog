
<!DOCTYPE html>

  <html lang="{{ config('app.locale') }}">
  
  <head>

    @include('partials._head')
  
  </head>

  <body>

    @include('partials._nav')

    <div class="container">
        
        @include('partials._messages')

        @yield('content')

    </div> <!-- end of container -->

    <div class="newsletter">
      
        @include('partials._newsletter')

    </div>

    <div class="footer">
      
        @include('partials._footer')

    </div>
    
    @include('partials._javascript')

    @yield('scripts')

  </body>

</html>