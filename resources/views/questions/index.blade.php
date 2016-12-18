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
                            <li><a href="login.html">Resurs 1</a></li>
                            <li><a href="signup.html">Resurs 2</a></li>
                        </ul>
                    </li>
                    <li class="current"><a href="#"><i class="glyphicon glyphicon-home"></i> CV</a></li>
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
                              <li><a href="/order/Newest">Newest</a>
                              </li>
                              <li><a href="/order/A-Z">A-Z</a>
                              </li>
                              <li><a href="/order/Z-A">Z-A</a>
                              </li>
                              
                          </ul>
                      </div>
                  </div>
                </div>

                <div class="content-box-large box-with-header">
                @foreach($questions as $question)
                
                
                  <ul class="event-list">
                  
                    <li class="questionListItem">
                      <div class="social">
                        <ul>

                              <li class="facebook" style="width:33%;">

                                  <a href="{{ url('/questionupvote') }}"
                                     onclick="event.preventDefault();
                                    document.getElementById('upvoteQuestion-form').submit();">
                                    <span class="glyphicon glyphicon-chevron-up">
                                      
                                    </span>
                                    <br>
                                    <small>{{$question->upVotes->count()}}</small>
                                  </a>
                                  <form id="upvoteQuestion-form" action="{{ url('/questionupvote') }}" method="POST" style="display: none;">
                                      <input type="hidden" value="{{$question->id}}" name="id" />
                                      {{ csrf_field() }}
                                  </form>


                                  <!--<form action="/questionupvote" method="post">

                                      <input type="hidden" value="{{$question->id}}" name="id" />
                                      {{csrf_field()}}
                                      <button type="submit">
                                      <span class="glyphicon glyphicon-chevron-up"></span><br>
                                        <small>
                                          {{--*App\QuestionEvaluation::where([
                                                           ['QuestionID','=',$question->QuestionID],
                                                           ['Username','=','Admini'],
                                                           ['Vote','=','Yes'],
                                                   ])->count()--}}
                                            {{$question->upVotes->count()}}
                                        </small>
                                  </button>
                                  </form>-->
                              </li>


                                <li class="twitter" style="width:33%;">
                                  <a href="{{ url('/questiondownvote') }}"
                                     onclick="event.preventDefault();
                                    document.getElementById('downvoteQuestion-form').submit();">
                                    <span class="glyphicon glyphicon-chevron-down">
                                      
                                    </span>
                                    <br>
                                    <small>{{$question->downVotes->count()}}</small>
                                  </a>
                                  <form id="downvoteQuestion-form" action="{{ url('/questiondownvote') }}" method="POST" style="display: none;">
                                      <input type="hidden" value="{{$question->id}}" name="id" />
                                      {{ csrf_field() }}
                                  </form>
                          <!--<form action="/questiondownvote" method="post">
                          <input type="hidden" value="{{$question->id}}" name="id" />
                            {{csrf_field()}}
                            <button type="submit">
                            <span class="glyphicon glyphicon-chevron-down"></span><br><small>
                                    {{$question->downVotes->count()}}
                          </small></button>
                          </form>-->
                          </li>
                          <li class="google-plus" style="width:33%;"><a href="/questions/{{$question->id}}"><span class="glyphicon glyphicon-comment"></span><br><small>{{$question->allAnswers->count()}}</small></a></li>
                        </ul>
                      </div>
                        
                      <div class="info">
                      <a  class="title" href="/questions/{{$question->id}}">{{substr($question->title,0,40)}}{{strlen($question->title)>40 ? "..." : ""}}</a>
                        
                        <p class="desc">{{ substr($question->content,0,70)}}{{strlen($question->content)>40 ? "..." : ""}}</p>
                        <ul style="width:auto; float: left;">
                          <li><a href="/categories">{{$question->category->name}}</a></li>
                        </ul>
                        <ul style="width: auto; float: left;" class="pull-right">
                          <li><p style="font-size: 9pt;">Posted {{$question->created_at->diffForHumans()}}  by <a>{{$question->user->username}}</a></p></li>
                        </ul>
                      </div>
                        </a>
                    </li>
                  </ul>
              <hr>
              @endforeach
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