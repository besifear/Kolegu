@extends('main')

@section('title',' | View Post')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $message->subject }}</h1>
            <p class="lead">{{$message->content}}</p>
            <hr>
            <p class="lead">Created by :{{$sender->username}}</p>
            <hr>
            <h4>Reply</h4>
            <hr>
                </ul>
                <div id="result"></div>
                <h3>Your reply</h3>
            {!! Form::open(array('route' => 'messages.store','data-parsley-validate'=>'')) !!}
            {{ Form::hidden('reciever_id',$message->sender_id)}}
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
                <br><br>
            <!--<form id="answer-form" class="" action="answers/store" method="POST">
                    <div class="form-group">
                      <textarea id="content" class="form-control" type="textarea" id="message" placeholder="Write your answer" maxlength="140" rows="7">
                      	
                      </textarea>
                      <input type="hidden" name="_method" value="POST"/> 
                      <input type="hidden" name="questionid" value={{$message->id}}/>
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
                    <dd>{{ date('j/m/Y H:i',strtotime ($message->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('j/m/Y H:i',strtotime ($message->updated_at)) }}</dd>
                </dl>

                @if(Auth::check())
                    @if(Auth::user()->id==$message->sender_id)
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="#" class="btn btn-primary btn-block">Edit</a>
                            </div>
                            <div class="col-sm-6">
                                {!! Form::open(['route' => ['messages.destroy' , $message->id], 'method' => 'DELETE']) !!}

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
