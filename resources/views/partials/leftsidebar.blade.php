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

          <li><a href="/resources">All</a></li>
          <li><a href="/resources/create">Add Resources</a></li>

          </ul>
      </li>
      <li class="current"><a href="/users"><i class="glyphicon glyphicon-user"></i>All Users</a></li>
      @if(!Auth::guest())
        @if(Auth::user()->role=='Admin')
      <li class="current"><a href="/sendemailtousers"><i class="glyphicon glyphicon-envelope"></i> Email Users</a></li>

        @endif
      @endif
      <!--<li><a href="calendar.html"><i class="glyphicon glyphicon-calendar"></i> Calendar</a></li>
      <li><a href="stats.html"><i class="glyphicon glyphicon-stats"></i> Statistics (Charts)</a></li>
      <li><a href="tables.html"><i class="glyphicon glyphicon-list"></i> Tables</a></li>
      <li><a href="buttons.html"><i class="glyphicon glyphicon-record"></i> Buttons</a></li>
      <li><a href="editors.html"><i class="glyphicon glyphicon-pencil"></i> Editors</a></li>
      <li><a href="forms.html"><i class="glyphicon glyphicon-tasks"></i> Forms</a></li>-->
  </ul>
</div>
