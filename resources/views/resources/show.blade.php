@extends('main')

@section('title',' | View Post')

@section('content')
	<div class="row">
		<div class="col-md-8">
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
                                    
                                    @elseif($resource->mime == 'application/pdf') 
                                    <a target="_blank" href="/fileentry/get/{{$resource->filename}}"><img src="/images/pdflogo.png" alt="Click Link!!" class="img-responsive" /></a>

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

                          <li><p style="font-size: 9pt;">Posted {{$resource->created_at->diffForHumans()}}  by <a href="/users/{{$resource->user->id}}">{{$resource->user->username}}</a></p></li>

                        </ul>
                      </div>
                        </a>
                    </li>
                  </ul>
              <hr>
          </div>
			<hr>
			<h4>Replys</h4>
                  <hr>
                  <div class="content-box-large box-with-header">

                      <form id="resourceReply-form"  method="POST" style="display: none;">
                          <input id="resourceReplyId" type="hidden" name="resourceReplyId" />
                          {{ csrf_field() }}
                      </form>

                  @foreach(App\ResourceReply::where('resource_id','=',$resource->id)->get() as $resourceReply)

                  <ul class="event-list answer">
                    <li>
                      <div class="social">
                        <ul>
                          <li class="facebook" style="width:33%;">


                                  <a
                                     onclick="event.preventDefault();
                                     document.getElementById('resourceReplyId').setAttribute('value', '{{$resourceReply->id}}');
                                     var forma =  document.getElementById('resourceReply-form');
                                             forma.setAttribute('action', '/resourcereplyupvote');
                                    forma.submit();">
                                    <span class="glyphicon glyphicon-chevron-up">

                                    </span>
                                    <br>
                                    <small>{{$resourceReply->upVotes->count()}}</small>
                                  </a>


                                  <!--<form action="/answerupvote" method="post">

                                      <input type="hidden" value="{{$resourceReply->id}}" name="id" />
                                      {{csrf_field()}}
                                      <button type="submit" >
                                      <span class="glyphicon glyphicon-chevron-up"></span><br>
                                        <small>
                                          {{--*App\QuestionEvaluation::where([
                                                           ['QuestionID','=',$resourceReply->QuestionID],
                                                           ['Username','=','Admini'],
                                                           ['Vote','=','Yes'],
                                                   ])->count()--}}
                                            {{$resourceReply->upVotes->count()}}
                                        </small>
                                  </button>
                                  </form>-->
                              </li>

                              <li class="twitter" style="width:33%;">

                              <a
                                     onclick="event.preventDefault();
                                 document.getElementById('resourceReplyId').setAttribute('value', '{{$resourceReply->id}}');
                                  var forma =  document.getElementById('resourceReply-form');
                                  forma.setAttribute('action', '/resourcereplydownvote');
                                  forma.submit();">

                                    <span class="glyphicon glyphicon-chevron-down">

                                    </span>
                                    <br>
                                    <small>{{$resourceReply->downVotes->count()}}</small>
                                  </a>


                                <!--<form action="/answerdownvote" method="post">
                                <input type="hidden" value="{{$resourceReply->id}}" name="id" />
                                  {{csrf_field()}}
                                  <button type="submit">
                                    <span class="glyphicon glyphicon-chevron-down"></span><br><small>
                                            {{$resourceReply->downVotes->count()}}
                                    </small>
                                  </button>
                                </form>-->
                              </li>

                        </ul>
                      </div>

                        <div class="info answerinfo">


                            <p class="desc">{{$resourceReply->content}}</p>
                            <ul style="width: auto; float: left;" class="pull-right">
                                <li><p style="font-size: 9pt;">Posted {{$resourceReply->created_at->diffForHumans()}}  by <a>{{$resourceReply->user->username}}</a></p></li>
                            </ul>
                        </div>
                    </li>
                    </ul>
                          <div class="pull-right">
                              @if(Auth::check())
                                  @if(Auth::user()->id==$resourceReply->user_id)


                                      {!! Form::open(['route' => ['resourcereplies.destroy' , $resourceReply->id], 'method' => 'DELETE']) !!}
                                            {{csrf_field()}}
                                      {!! Form::submit('Delete',['class' => 'btn btn-danger btn-xs'])!!}

                                      {!! Form::close()!!}


                                  @endif
                              @endif

                              <br>
                          </div>
                    <hr style="clear: both;">



                    @endforeach
                    </div>
                  </ul>
                  <div id="result"></div>
                  <h3>Your Reply</h3>
                  	{!! Form::open(['route' => ['resourcereplies.store' , 'method' => 'POST']]) !!}
          					{{ Form::label('content','Content:')}}
          		    		{{ Form::textarea('content',null,array('class' => 'form-control','required'=>'','maxlength'=>'500'))}}
          		    		<input type="hidden" name="id" value={{$resource->id}}>
          					{!! Form::submit('Post',['class' => 'btn btn-primary btn-block'])!!}

          					{!! Form::close()!!}
					       <br><br>
                  <!--<form id="answer-form" class="" action="answers/store" method="POST">
                    <div class="form-group">
                      <textarea id="content" class="form-control" type="textarea" id="message" placeholder="Write your answer" maxlength="140" rows="7">

                      </textarea>
                      <input type="hidden" name="_method" value="POST"/>
                      <input type="hidden" name="questionid" value={{$resource->id}}/>
                      <!--<span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>-->
                  	<!--  </div>
                    <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Post</button>
                  </form>
                  <br><br>
                  -->
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At :</dt>
					<dd>{{ date('j/m/Y H:i',strtotime ($resource->created_at)) }}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('j/m/Y H:i',strtotime ($resource->updated_at)) }}</dd>
				</dl>

                @if(Auth::check())
                @if(Auth::user()->id==$resource->user_id)
                    <hr>
      				<div class="row">
      					<div class="col-sm-6">
      						<a href="#" class="btn btn-primary btn-block">Edit</a>
      					</div>
      						<div class="col-sm-6">
      							{!! Form::open(['route' => ['resources.destroy' , $resource->id], 'method' => 'DELETE']) !!}

      							{!! Form::submit('Delete',['class' => 'btn btn-danger btn-block'])!!}

      							{!! Form::close()!!}
						</div>
				</div>
                    @endif
                    @endif
			</div>
		</div>
	</div>
@stop

@section('scripts')
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-585fc7f429fa1254"></script>
@stop
