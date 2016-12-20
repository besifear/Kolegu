  @extends('main')

  @section('title',' | Homepage')

  @section('content')

		<div class="row">
            <div class="col-lg-12">
                <div class="content-box">
                    <div class="panel-body">
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object dp img-circle" src="images/facebook.png" style="width: 150px;height:150px;">
                                </a>
                                <div class="media-body">
                                    <h2 class="media-heading">{{$user->username}}<small> Developer</small></h2>
                                    <h4>Software Developer at <a href="#">Kitrrat.io</a></h4>
                                    <hr style="margin:8px auto">
                                    @foreach(App\SelectedCategory::where('user_id','=',$user->id)->get() as $selectedcategory)
                                      <span class="label label-info">{{$selectedcategory->category->name}}</span>
                                    @endforeach
                                </div>
                                <div class="media-side pull-right">
                                    <p><span class="glyphicon glyphicon-repeat"></span> Member for 10 months</p>
                                    <p><span class="glyphicon glyphicon-time"></span> Last seen 32 minutes ago</p>
                                    <hr>
                                    <div class="centered">
                                        <a style="margin-right: 12px;" href="#" data-toggle="modal" data-target="#messageModal" class="btn btn-primary btn-sm center-block col-lg-5"><i class="fa fa-envelope"></i></a>
                                        <a href="/messages" style="margin-left: 12px;"  data-toggle="modal" data-target="#inboxModal" class="btn btn-warning btn-sm center-block col-lg-5"><i class="fa fa-inbox"></i></a>
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
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10">
                        <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab">
                                    <div class="hidden-xs">Asked</div>
                                </button>
                            </div>

                            <div class="btn-group" role="group">
                                <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab">
                                    <div class="hidden-xs">Answered</div>
                                </button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab">
                                    <div class="hidden-xs">idk</div>
                                </button>
                            </div>
                        </div>
                        <div class="well">
                              <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab1">
                                     <div class="content-box-large box-with-header">
                                      @foreach(App\Question::where('user_id','=',$user->id)->get() as $question)

                                       
                                            <ul class="event-list answer">
                                                <li>
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
                                                                  </li>
                                                              <li class="google-plus" style="width:33%;">
                                                              <a href="/questions/{{$question->id}}"><span class="glyphicon glyphicon-comment"></span><br><small>
                                                                {{$question->allAnswers->count()}}
                                                              </small></a></li>
                                                            </ul>
                                                          </div>
                                                          
                                                          <div class="info answerinfo">
                                                          <a class="questionLink title" href="/questions/{{$question->id}}">{{substr($question->title,0,40)}}{{strlen($question->title)>40 ? "..." : ""}}</a>
                                                            <p class="desc">{{ substr($question->content,0,70)}}{{strlen($question->content)>40 ? "..." : ""}}</p>
                                                            <ul style="width:auto; float: left;">
                                                              <li><a href="/categories">{{$question->category->name}}</a></li>
                                                            </ul>
                                                            <ul style="width: auto; float: left;" class="pull-right">
                                                              <li><p style="font-size: 9pt;">Posted {{$question->created_at->diffForHumans()}}  by <a>{{$question->user->username}}</a></p></li>
                                                            </ul>
                                                           </div> 
                                                    </li>  
                                            </ul>
                                        <hr>
                                      @endforeach
                                      </div>
                                    </div>
                                    <div class="tab-pane fade in" id="tab2">

                                    <div class="content-box-large box-with-header">
                                      @foreach(App\Answer::where('user_id','=',$user->id)->get() as $answer)

                                        <ul class="event-list answer">
                                            <li>
                                              <div class="social">
                                                <ul>
                                                  <li class="facebook" style="width:33%;">
                                                          <a href="{{ url('/answerupvote') }}"
                                                             onclick="event.preventDefault();
                                                            document.getElementById('upvoteAnswer-form').submit();">
                                                            <span class="glyphicon glyphicon-chevron-up">
                                                              
                                                            </span>
                                                            <br>
                                                            <small>{{$answer->upVotes->count()}}</small>
                                                          </a>
                                                          <form id="upvoteAnswer-form" action="{{ url('/answerupvote') }}" method="POST" style="display: none;">
                                                              <input type="hidden" value="{{$answer->id}}" name="id" />
                                                              {{ csrf_field() }}
                                                          </form>
                                                      </li>

                                                      <li class="twitter" style="width:33%;">

                                                        <a href="{{ url('/answerdownvote') }}"
                                                           onclick="event.preventDefault();
                                                          document.getElementById('downvoteAnswer-form').submit();">
                                                          <span class="glyphicon glyphicon-chevron-down">
                                                            
                                                          </span>
                                                          <br>
                                                          <small>{{$answer->downVotes->count()}}</small>
                                                        </a>
                                                        <form id="downvoteAnswer-form" action="{{ url('/answerdownvote') }}" method="POST" style="display: none;">
                                                            <input type="hidden" value="{{$answer->id}}" name="id" />
                                                            {{ csrf_field() }}
                                                        </form>
                                                      </li>
                                                  
                                                </ul>
                                              </div>

                                              <div class="info answerinfo">

                                                <br>

                                                <p class="desc">{{$answer->content}}</p>
                                                <ul style="width: auto; float: left;" class="pull-right">
                                                  <li >
                                                      <a class="questionLink" href="/questions/{{$answer->question->id}}">

                                                        Answered at question :{{$answer->question->title}}
                                                      </a>
                                                  </li>  
                                                  <li><p style="font-size: 9pt;">Posted {{$answer->created_at->diffForHumans()}}  by <a>{{$answer->user->username}}</a></p></li>
                                                </ul>
                                            </div>

                                          </li>  
                                          
                                        </ul>
                                         <hr>
                                      @endforeach
                                      </div> 
                                    </div>
                                    <div class="tab-pane fade in" id="tab3">
                                      <h3>This is tab 3</h3>
                                    </div>
                              </div>
                        </div>
            </div>
            <div class="col-lg-2">
                <div class="content-box">
                    <div class="panel-body">
                        Achievements go here
                    </div>
                </div>
            </div>
        </div>

  @stop