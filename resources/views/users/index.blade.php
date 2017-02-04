@extends('main')

  @section('title',' | Homepage')
  <style media="screen">
            ul {
                list-style: none;
                padding: 0;
            }
        </style>

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
                    <li class="current"><a href="/users"><i class="glyphicon glyphicon-user"></i>All Users</a></li>
                    <li class="current"><a href="#"><i class="glyphicon glyphicon-home"></i> CV</a></li>
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
      </div>
      <div class="col-md-10">
        <div class="row">

          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                
              {!! Form::open(array('route' => 'searchusers' ,'class'=>'navbar-form')) !!}
              <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search Users" name="word">
                  <div class="input-group-btn">
                      <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                  </div>
              </div>
              {!! Form::close() !!}
                <div class="col-lg-12">

                @foreach($halfusers0 as $user)
                  <div class="col-lg-6">
                  <ul class="thumbnails">
                          <li class="clearfix">
                            <div class="thumbnail clearfix">
                              <img src="/images/profilepicture100x100.png" alt="profilepic" class="pull-left clearfix img-circle">
                              <div class="caption pull-left">
                                <h4>
                                    <a href="/users/{{$user->id}}">{{$user->username}}</a>
                                </h4>
                                <div class="centered">
                                        <a href="#" data-toggle="modal" data-target="#messageModal" class="btn btn-primary btn-sm"><i class="fa fa-envelope"></i></a>
                                            <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                  <h4 class="modal-title" id="lineModalLabel">Send Message</h4>
                                                </div>
                                                <div class="modal-body">

                                                    {!! Form::open(array('route' => 'messages.store','data-parsley-validate'=>'')) !!}
                                                        {{ Form::hidden('reciever_id',$user->id)}}
                                                        <div class="form-group">
                                                    {{ Form::label('subject','Subject:')}}
                                                    {{ Form::text('subject',null,array('class' => 'form-control','required'=>'','maxlength'=>'50'))}}
                                                        </div>
                                                        <div class="form-group">
                                                            {{ Form::label('content','Message:')}}
                                                            {{ Form::textarea('content',null,array('class' => 'form-control','id'=>'exampleInputEmail1','required'=>'','maxlength'=>'500'))}}

                                                        </div>
                                                    {{ Form::submit('Send Message',array('class' => 'btn btn-default'))}}
                                                    {!! Form::close() !!}
                                                        <!--
                                                  <form action="messages" method="post">
                                                            {{csrf_field()}}
                                                            <input name="reciver_id" type="hidden" value="{{$user->id}}">
                                                          <div class="form-group">
                                                            <label for="exampleInputEmail1">Subject</label>
                                                            <input name="subject" type="text"  class="form-control" id="exampleInputEmail1" placeholder="">
                                                          </div>
                                                          <div class="form-group">
                                                            <label for="exampleInputPassword1">Message</label>
                                                            <textarea name="message" class="form-control"  id="exampleInputPassword1" placeholder=""></textarea>
                                                          </div>
                                                          <button type="submit" class="btn btn-default">Submit</button>
                                                        </form>
                                                        -->
                                                </div>
                                              </div>
                                              </div>
                                            </div>

                                        <!--<a href="#" class=""><i class="fa fa-facebook-square fa-2x"></i></a>&nbsp;&nbsp;
                                        <a href="#" class=""><i class="fa fa-twitter-square fa-2x"></i></a>&nbsp;&nbsp;
                                        <a href="#" class=""><i class="fa fa-google-plus-square fa-2x"></i></a>&nbsp;&nbsp;-->
                                    </div>
                              </div>
                            </div>
                           </li>
                      </ul>
                  </div>
                  @endforeach

                  @foreach($halfusers1 as $user)
                  <div class="col-lg-6">
                  <ul class="thumbnails">
                          <li class="clearfix">
                            <div class="thumbnail clearfix">
                              <img src="/images/profilepicture100x100.png" alt="profilepic" class="pull-left clearfix img-circle">
                              <div class="caption pull-left">
                                <h4>
                                    <a href="/users/{{$user->id}}" >{{$user->username}}</a>
                                </h4>
                                <div class="centered">
                                        <a href="#" data-toggle="modal" data-target="#messageModal" class="btn btn-primary btn-sm"><i class="fa fa-envelope"></i></a>
                                            <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                  <h4 class="modal-title" id="lineModalLabel">Send Message</h4>
                                                </div>
                                                <div class="modal-body">

                                                    {!! Form::open(array('route' => 'messages.store','data-parsley-validate'=>'')) !!}
                                                        {{ Form::hidden('reciever_id',$user->id)}}
                                                        <div class="form-group">
                                                    {{ Form::label('subject','Subject:')}}
                                                    {{ Form::text('subject',null,array('class' => 'form-control','required'=>'','maxlength'=>'50'))}}
                                                        </div>
                                                        <div class="form-group">
                                                            {{ Form::label('content','Message:')}}
                                                            {{ Form::textarea('content',null,array('class' => 'form-control','id'=>'exampleInputEmail1','required'=>'','maxlength'=>'500'))}}

                                                        </div>
                                                    {{ Form::submit('Send Message',array('class' => 'btn btn-default'))}}
                                                    {!! Form::close() !!}
                                                        <!--
                                                  <form action="messages" method="post">
                                                            {{csrf_field()}}
                                                            <input name="reciver_id" type="hidden" value="{{$user->id}}">
                                                          <div class="form-group">
                                                            <label for="exampleInputEmail1">Subject</label>
                                                            <input name="subject" type="text"  class="form-control" id="exampleInputEmail1" placeholder="">
                                                          </div>
                                                          <div class="form-group">
                                                            <label for="exampleInputPassword1">Message</label>
                                                            <textarea name="message" class="form-control"  id="exampleInputPassword1" placeholder=""></textarea>
                                                          </div>
                                                          <button type="submit" class="btn btn-default">Submit</button>
                                                        </form>
                                                        -->
                                                </div>
                                              </div>
                                              </div>
                                            </div>

                                        <!--<a href="#" class=""><i class="fa fa-facebook-square fa-2x"></i></a>&nbsp;&nbsp;
                                        <a href="#" class=""><i class="fa fa-twitter-square fa-2x"></i></a>&nbsp;&nbsp;
                                        <a href="#" class=""><i class="fa fa-google-plus-square fa-2x"></i></a>&nbsp;&nbsp;-->
                                    </div>
                              </div>
                            </div>
                           </li>
                      </ul>
                  </div>   
                  @endforeach     
              </div>

              
              </div>
            </div>
          </div>
          <div class="col-md-4">
            
          </div>

        </div>
      </div>
      </div>

  @stop