<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials._head')
  </head>  
  <body>

    <!-- Default Bootstrap Navbar -->
    @include('partials._nav')

    <div class="page-content">

    @include('partials._messages')

    @yield('content')

    @include('partials._footer')
      
    </div> <!-- end of .page-content -->
    

    @include('partials._javascript')
    
    @yield('scripts')

  </body>

</html>