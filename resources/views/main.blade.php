<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials._head')
    @yield('styles') 
  </head>
  <body>
    <div id = "app"> 
      <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>

        <!-- Default Bootstrap Navbar -->
        @include('partials._nav')

        <div class="page-content">

      	@include('partials.searchmodal')

        @include('partials._messages')

        @yield('content')

        @include('partials._footer')

        </div> <!-- end of .page-content -->

    </div>
    <!-- Sherben per vuejs -->
    @include('footer')

    @include('partials._javascript')
    @yield('scripts')

  </body>

</html>
