@extends('main')

@section('title',' | View Post')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $question->title }}</h1>
			<p class="lead">{{$question->content}}</p>
			<hr>
			<p class="lead">Created by :{{$question->user->username}}</p>
			<hr>
			<h4>Answers</h4>
                  <hr>
                  @foreach(App\Answer::where('question_id','=',$question->id)->get() as $answer)
                  <ul class="event-list answer">
                    <li>
                      <div class="social">
                        <ul>
                          <li class="facebook" style="width:33%;"><a href="#"><span class="glyphicon glyphicon-chevron-up"></span><br><small>136</small></a></li>
                          <li class="twitter" style="width:33%;"><a href="#"><span class="glyphicon glyphicon-chevron-down"></span><br><small>42</small></a></li>
                          <!--<li class="google-plus" style="width:33%;"><a href="#"><span class="glyphicon glyphicon-comment"></span><br><small>7</small></a></li>-->
                        </ul>
                      </div>
                      
                      <div class="info answerinfo">

                        
                        <p class="desc">{{$answer->content}}</p>
                        <ul style="width: auto; float: left;" class="pull-right">
                          <li><p style="font-size: 9pt;">Posted {{$answer->created_at->diffForHumans()}}  by <a>{{$answer->user->name}}</a></p></li>
                        </ul>
                      </div>
                    </li>
                    <div class="pull-right">
                      <button class="btn btn-success btn-xs">Edit</button>
                      <button class="btn btn-danger btn-xs">Delete</button>
                      <br><br>
                    </div>
                    <hr style="clear: both;">
                    @endforeach
                  </ul>
                  <div id="result"></div>
                  <h3>Your answer</h3>
                  	{!! Form::open(['route' => ['answers.store' , 'method' => 'POST']]) !!}
					{{ Form::label('content','Content:')}}
		    		{{ Form::textarea('content',null,array('class' => 'form-control','required'=>'','maxlength'=>'500'))}}
		    		<input type="hidden" name="id" value={{$question->id}}>
					{!! Form::submit('Post',['class' => 'btn btn-primary btn-block'])!!}

					{!! Form::close()!!}	
					<br><br>
                  <!--<form id="answer-form" class="" action="answers/store" method="POST">
                    <div class="form-group">
                      <textarea id="content" class="form-control" type="textarea" id="message" placeholder="Write your answer" maxlength="140" rows="7">
                      	
                      </textarea>
                      <input type="hidden" name="_method" value="POST"/> 
                      <input type="hidden" name="questionid" value={{$question->id}}/>
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
					<dd>{{ date('j/m/Y H:i',strtotime ($question->created_at)) }}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('j/m/Y H:i',strtotime ($question->updated_at)) }}</dd>
				</dl>
                @if(Auth::check())
                @if(Auth::user()->id==$question->user_id)
                    <hr>
				<div class="row">
					<div class="col-sm-6">
						<a href="#" class="btn btn-primary btn-block">Edit</a>
					</div>
						<div class="col-sm-6">
							{!! Form::open(['route' => ['questions.destroy' , $question->id], 'method' => 'DELETE']) !!}
							
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
