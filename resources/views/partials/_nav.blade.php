    <nav class="navbar navbar-default" role="navigation">
      <div class="shrinkednav">

      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header col-lg-8 col-md-12 col-sm-5 col-xs-12">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="/">K</a>

        <div class="col-md-10 col-sm-10 col-xs-8">
            <form class="navbar-form" role="search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="q">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
            </form>
        </div>

      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse col-sm-4 col-xs-12 pull-right" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/questions/create"><b class="glyphicon glyphicon-send"></b> Pyet</a></li>
          <li><a href="/"><b class="glyphicon glyphicon-comment"></b> Pergjigju</a></li>

            @if(Auth::guest())
                <li><a href="{{url('/login')}}"><b class="glyphicon glyphicon-send"></b> Login</a></li>
                <li><a href="{{ url('/register') }}"><b class="glyphicon glyphicon-send"></b> Register</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="glyphicon glyphicon-bell"></b> Notifications</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Another action</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>

                <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="glyphicon glyphicon-user"></b> User</a>
            <ul class="dropdown-menu">
              <li><a href="#">Profile</a></li>
              <li><a href="#">Settings</a></li>
              <li><a href="/categories/create">Create Category</a></li>
              <li><a href="/Kategorite">Selected Categories</a></li>
              <li class="divider"></li>
              <li><a href="{{ url('/logout') }}"
                     onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout
                  </a>
                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </li>
            </ul>
          </li>
                @endif
        </ul>
      </div><!-- /.navbar-collapse -->

      </div>
    </nav>