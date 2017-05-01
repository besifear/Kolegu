
<ul class="event-list answer">
<li>
  <div class="social">
    <ul>
        @if(auth::user() != null)
            @if($answer->getMyUpVote!=null)
                <li class="facebook aqua" style="width:33%;">
            @else
                <li class="facebook" style="width:33%;">
            @endif

        @else
            <li class="facebook" style="width:33%;">
        @endif
          <a
                  onclick="
                          event.preventDefault();
                          document.getElementById('id').setAttribute('value','{{$answer->id}}');
                          var forma = document.getElementById('voteAnswer-form');
                          forma.setAttribute('action','/answerupvote');
                          forma.submit();
                          ">
                <span class="glyphicon glyphicon-chevron-up">

                </span>
              <br>
              <small>{{$answer->upVotes->count()}}</small>
          </a>
          </li>

            @if(auth::user() != null)

                @if($answer->getMyDownVote!=null)
                    <li class="twitter lava" style="width:33%;">
                @else
                    <li class="twitter" style="width:33%;">
                @endif

            @else
                <li class="twitter" style="width:33%;">
                    @endif

              <a
                      onclick="
                              event.preventDefault();
                              document.getElementById('id').setAttribute('value','{{$answer->id}}');
                              var forma = document.getElementById('voteAnswer-form');
                              forma.setAttribute('action','/answerdownvote');
                              forma.submit();
                              ">
                <span class="glyphicon glyphicon-chevron-down">

                </span>
                  <br>
                  <small>{{$answer->downVotes->count()}}</small>
              </a>
          </li>
    </ul>
  </div>
    <div class="info answerinfo">
        <p class="desc">{{$answer->content}}</p>
        <ul style="width: auto; float: left;" class="pull-right">
            <li><p style="font-size: 9pt;">Posted {{$answer->created_at->diffForHumans()}}  by <a>{{$answer->user->username}}</a></p></li>
        </ul>
    </div>
</li>
</ul> 
      @if($question->answer_id != $answer->id)
      <div class="pull-left">
          @if(Auth::check())
              @if(Auth::user()->id==$question->user_id)
                @if(Auth::user()->id!=$answer->user_id)
                    {{ Form::open(['route' => ['questions.update', $question->id], 'method' => 'PUT']) }}
                    {{ Form::hidden ('answer_id',$answer->id) }}
                    {{ Form::hidden('question_id',$question->id)}}
                    {{ Form::submit('Përgjigjja e saktë',['value'=>$question->answer_id, 'class' => 'btn btn-success btn-xs choosing-best-answer'])}}
                    {{ Form::close()}}
                @endif    
              @endif
          @endif
          <br>
      </div>
      @elseif($question->answer_id = $answer->id)
      <div class="pull-left">
          @if(Auth::check())
              @if(Auth::user()->id==$question->user_id)
                  {{ Form::open(['route' => ['questions.update', $question->id], 'method' => 'PUT']) }}
                  {{ Form::hidden ('answer_id','null') }}
                  {{ Form::hidden('question_id',$question->id)}}
                  {{ Form::submit('Largo përgjigjjen e saktë',['class' => 'btn btn-danger btn-xs choosing-best-answer'])}}
                  {{ Form::close()}}
              @endif
          @endif
          <br>
      </div>
      @endif
      <div class="pull-right">
          @if(Auth::check())
              @if(Auth::user()->id==$answer->user_id)
                  {!! Form::open(['route' => ['answers.destroy' , $answer->id], 'method' => 'DELETE']) !!}

                  {!! Form::submit('Fshije',['class' => 'btn btn-danger btn-xs'])!!}

                  {!! Form::close()!!}
              @endif
          @endif
          <br>
      </div>
<hr style="clear: both;">
