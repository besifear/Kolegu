<!-- Left Side Bar -->

<div class="sidebar content-box" style="display: block;">
  <ul class="nav">
      <!-- Main menu -->

      <li class="submenu">
           <a href="#">
              <i class="glyphicon glyphicon-stats"></i> Resurset
              <span class="caret pull-right"></span>
           </a>
           <!-- Sub menu -->
           <ul>

          <li><a href="/resources">Të gjitha Resurset</a></li>
          <li><a href="/resources/create">Shto një Resurs</a></li>

          </ul>
      </li>
      <li class="current"><a href="/users"><i class="glyphicon glyphicon-user"></i>Përdoruesit</a></li>
      @if(!Auth::guest())
        @if(Auth::user()->role=='Admin')
      <li class="current"><a href="/sendemailtousers"><i class="glyphicon glyphicon-envelope"></i>Dërgoju Email Përdoruesve</a></li>

        @endif
      @endif
  </ul>
</div>
