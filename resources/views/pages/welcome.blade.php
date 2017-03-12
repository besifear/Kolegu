  @extends('main')

  @section('title',' | Homepage')

  @section('content')

      <div class="row">
      <div class="col-md-2">
      <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Temat
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="login.html">Tema 1</a></li>
                            <li><a href="signup.html">Tema 2</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-stats"></i> Resurset
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                             <li><a href="/resources">All</a></li>
                             <li><a href="#">Add Later</a></li>
                         </ul>
                    </li>
                    <li class="current"><a href="index.html"><i class="glyphicon glyphicon-home"></i> CV</a></li>
                    <!--<li><a href="calendar.html"><i class="glyphicon glyphicon-calendar"></i> Calendar</a></li>
                    <li><a href="stats.html"><i class="glyphicon glyphicon-stats"></i> Statistics (Charts)</a></li>
                    <li><a href="tables.html"><i class="glyphicon glyphicon-list"></i> Tables</a></li>
                    <li><a href="buttons.html"><i class="glyphicon glyphicon-record"></i> Buttons</a></li>
                    <li><a href="editors.html"><i class="glyphicon glyphicon-pencil"></i> Editors</a></li>
                    <li><a href="forms.html"><i class="glyphicon glyphicon-tasks"></i> Forms</a></li>-->
                </ul>
      </div>
      </div>
      <div class="col-md-10">
        <div class="row">

          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">
                <div class="content-box-header">
                  <div class="panel-title">Actions</div>

                  <div class="pull-right">
                      <div class="btn-group">
                          <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                              Actions
                              <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu pull-right" role="menu">
                              <li><a href="#">Action</a>
                              </li>
                              <li><a href="#">Another action</a>
                              </li>
                              <li><a href="#">Something else here</a>
                              </li>
                              <li class="divider"></li>
                              <li><a href="#">Separated link</a>
                              </li>
                          </ul>
                      </div>
                  </div>
                </div>
                <div class="content-box-large box-with-header">
                  <ul class="event-list">
                    <li>
                         <div class="social">
                        <ul>
                          <li class="facebook" style="width:33%;"><a href="#"><span class="glyphicon glyphicon-chevron-up"></span><br><small>136</small></a></li>
                          <li class="twitter" style="width:33%;"><a href="#"><span class="glyphicon glyphicon-chevron-down"></span><br><small>42</small></a></li>
                          <li class="google-plus" style="width:33%;"><a href="#"><span class="glyphicon glyphicon-comment"></span><br><small>7</small></a></li>
                        </ul>
                      </div>
                      <div class="info">
                        <h2 class="title">Question</h2>
                        <p class="desc">Description</p>
                        <ul style="width:auto; float: left;">
                          <li><a href="#website">tag1</a></li>
                          <li><a href="#website">tag2</a></li>
                        </ul>
                        <ul style="width: auto; float: left;" class="pull-right">
                          <li><p style="font-size: 9pt;">Posted 69 minutes ago by <a>IlliPilli</a></p></li>
                        </ul>
                      </div>
                    </li>
                    <hr>
                  </ul>
              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-12">
                <div class="content-box-header">
                  <div class="panel-title">Related</div>
                </div>
                <div class="content-box-large box-with-header">
                  questions
              </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      </div>

  @stop