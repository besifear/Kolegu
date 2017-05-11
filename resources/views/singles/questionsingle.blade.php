<ul class="event-list">

  <li class="questionListItem">
    <div class="social">
      <ul>

          @if(auth::user() != null)
              @if ($question->getMyUpVote!= null)
                  <li class="facebook aqua" style="width:33%;">
              @else
                  <li class="facebook" style="width:33%;">
              @endif
          @else
              <li class="facebook" style="width:33%;">
          @endif

                <a
                   onclick="event.preventDefault();
                  document.getElementById('question_id').setAttribute('value', '{{$question->id}}');
                           var forma = document.getElementById('voteQuestion-form');
                               forma.setAttribute('action','\\questionupvote');
                               forma.submit();
                           ">

                  <span class="glyphicon glyphicon-chevron-up">

                  </span>
                  <br>
                  <small>{{$question->upVotes->count()}}</small>
                </a>
            </li>

              @if(auth::user() != null)
                  @if ($question->getMyDownVote!= null)
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
                   document.getElementById('question_id').setAttribute('value','{{$question->id}}');
                    var forma = document.getElementById('voteQuestion-form');
                        forma.setAttribute('action','\\questiondownvote');
                        forma.submit();
                           ">
                  <span class="glyphicon glyphicon-chevron-down">

                  </span>
                  <br>
                  <small>{{$question->downVotes->count()}}</small>
                </a>
        </li>
        <li class="google-plus" style="width:33%;"><a href="/questions/{{$question->id}}"><span class="glyphicon glyphicon-comment"></span><br><small>{{$question->allAnswers->count()}}</small></a></li>
      </ul>
    </div>

    <div class="info">

    <a  class="title" href="/questions/{{$question->id}}">{{substr($question->title,0,40)}}{{strlen($question->title)>40 ? "..." : ""}}</a>

      <p class="desc">{!! substr($question->content, 0, 120)!!}{{strlen($question->content)>120 ? "..." : ""}}</p>
      <ul style="width:auto; float: left;">
        <li><a href="/categories">{{$question->category->name}}</a></li>
      </ul>
      <ul style="width: auto; float: left;" class="pull-right">
        <li><p style="font-size: 9pt;">Posted {{$question->created_at->diffForHumans()}} by <a href="/users/{{$question->user->id}}">{{$question->user->username}}</a></p></li>
      </ul>
    </div>
      </a>
  </li>
  <div class="pull-right">
    @if(Auth::check())
    @if(Auth::user()->id==$question->user_id)
                    {!! Form::open(['route' => ['questions.destroy', $question->id], 'method' => 'DELETE']) !!}
                    {!! Form::hidden('id', $question->id , ['name' => 'id']) !!}
                    {!! Form::submit('Fshije',['class' => 'btn btn-danger btn-xs'])!!}

                    {!! Form::close()!!}
        @endif
        @endif

    <!--<button class="btn btn-danger btn-xs">Delete</button>-->

    </div><br>
</ul>
<br>
