@extends('main')


  @section('title',' | Resources')

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

                         <ul>                             <li><a href="/resources">All</a></li>                             <li><a href="#">Add Later</a></li>                         </ul>
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

          <div class="col-md-12">
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
                              <li><a href="/orderresources/Newest">Newest</a>
                              </li>
                              <li><a href="/orderresources/A-Z">A-Z</a>
                              </li>
                              <li><a href="/orderresources/Z-A">Z-A</a>
                              </li>
                              
                          </ul>
                      </div>
                  </div>
                </div>
                <br>
                @foreach($resources as $resource)
                <div class="content-box-large box-with-header clearfix" >
                
                
                
                  <ul class="event-list">
                  

                    <li class="questionListItem">
                      <div class="social">
                        <ul>

                              <li class="facebook" style="width:33%;">


                                  <a
                                     onclick="event.preventDefault();
                                    document.getElementById('resource_id').setAttribute('value', '{{$resource->id}}');
                                             var forma = document.getElementById('voteResource-form');
                                                 forma.setAttribute('action','\\resourceupvote');
                                                 forma.submit();
                                             ">


                                    <span class="glyphicon glyphicon-chevron-up">
                                      
                                    </span>
                                    <br>

                                    <small>{{$resource->votes('Yes')->count()}}</small>
                                  </a>



                                  <!--<form action="/questionupvote" method="post">

                                      <input type="hidden" value="{{$resource->id}}" name="id" />
                                      {{csrf_field()}}
                                      <button type="submit">
                                      <span class="glyphicon glyphicon-chevron-up"></span><br>
                                        <small>
                                          {{--*App\QuestionEvaluation::where([
                                                           ['QuestionID','=',$question->QuestionID],
                                                           ['Username','=','Admini'],
                                                           ['Vote','=','Yes'],
                                                   ])->count()--}}
                                            {{$resource->votes('Yes')->count()}}
                                        </small>
                                  </button>
                                  </form>-->

                              </li>


                                <li class="twitter" style="width:33%;">

                                  <a
                                     onclick="
                                     event.preventDefault();
                                     document.getElementById('resource_id').setAttribute('value','{{$resource->id}}');
                                      var forma = document.getElementById('voteResource-form');
                                          forma.setAttribute('action','resourcedownvote');
                                          forma.submit();
                                             ">

                                    <span class="glyphicon glyphicon-chevron-down">
                                      
                                    </span>
                                    <br>

                                    <small>{{$resource->votes('No')->count()}}</small>
                                  </a>
                          <!--<form action="/resourcedownvote" method="post">
                          <input type="hidden" value="{{$resource->id}}" name="id" />
                            {{csrf_field()}}
                            <button type="submit">
                            <span class="glyphicon glyphicon-chevron-down"></span><br><small>
                                    {{$resource->votes('No')->count()}}
                          </small></button>
                          </form>-->
                          </li>
                          <li class="google-plus" style="width:33%;"><a href="/resources/{{$resource->id}}"><span class="glyphicon glyphicon-comment"></span><br><small>{{$resource->allAnswers->count()}}</small></a></li>

                        </ul>
                      </div>
                        
                      <div class="info">
                          
                          <div class="row">
                          <div class="col-md-4">
                            <ul class="thumbnails">
                              <div class="col-md-12">
                                <div class="thumbnail">
                                    @if(substr($resource->mime, 0, 5) == 'image') 
                                    <a target="_blank" href="/fileentry/get/{{$resource->filename}}"><img src="{{route('getentry', $resource->filename)}}" alt="Click Link!!" class="img-responsive" /></a>
                                    
                                    @else
                                    <a target="_blank" href="/fileentry/get/{{$resource->filename}}"><img src="/images/filelogo.png" alt="Click Link!!" class="img-responsive" /></a>
                                    
                                    @endif
                                      <div class="caption">
                                        <a target="_blank" href="/fileentry/get/{{$resource->filename}}">{{ substr($resource->original_filename,0,25)}}{{strlen($resource->original_filename)>25 ? "..." : ""}}</a>
                                      </div>
                                 </div> 
                               </ul>
                              </div> 
                              <div class="col-md-8">
                                 <a  class="title" href="/resources/{{$resource->id}}">{{substr($resource->title,0,40)}}{{strlen($resource->title)>40 ? "..." : ""}}</a>
                                 <hr>
                                <p class="desc">{{ substr($resource->content,0,70)}}{{strlen($resource->content)>40 ? "..." : ""}}</p>
                            </div>
                            </div>

                        <ul style="width:auto; float: left;">
                          <li><a href="/categories">{{$resource->category->name}}</a></li>
                        </ul>
                        <ul style="width: auto; float: left;" class="pull-right">

                          <li><p style="font-size: 9pt;">Posted {{$resource->created_at->diffForHumans()}}  by <a>{{$resource->user->username}}</a></p></li>

                        </ul>
                      </div>
                        </a>
                    </li>
                  </ul>
              <hr>
          </div>
              @endforeach
                    <form id="voteResource-form"   method="POST" style="display: none;">
                        <input type="hidden" id= "resource_id" name="resource_id" />
                        {{ csrf_field()}}
                    </form>

              
              </div>
            </div>
          </div>

        </div>
      </div>
      </div>

  @stop