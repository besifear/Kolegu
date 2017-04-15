<!-- Navigation Bar -->
<nav class="navbar navbar-default" role="navigation">
  <div class="shrinkednav">

  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header col-lg-7 col-md-12 col-sm-5 col-xs-12">

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <a class="navbar-brand" href="/">K</a>

    <div class="col-md-10 col-sm-10 col-xs-8">
        {!! Form::open(array('route' => 'searches' ,'class'=>'navbar-form')) !!}
          <div class="input-group">
              <input type="text" class="form-control" placeholder="Kërko" name="word">
              <div class="input-group-btn">
                  <button style="height: 34px;" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              </div>
          </div>
          {!! Form::close() !!}
    </div>

  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse col-sm-4 col-xs-12 pull-right" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
        <li><a href="/questions/create"><b class="glyphicon glyphicon-send"></b> Pyet</a></li>
      <li><a href="/"><b class="glyphicon glyphicon-comment"></b> Pergjigju</a></li>


        @if(Auth::guest())
            <li><a href="{{url('/login')}}"><b class="glyphicon glyphicon-log-in"></b> Kyçu</a></li>
            <li><a href="{{ url('/register') }}"><b class="fa fa-key"></b> Regjistrohu</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="glyphicon glyphicon-bell"></b> Njoftime</a>
                <ul class="dropdown-menu">
                    <li><a href="/messages">Mesazhet
                            @if(Auth::user()->unseenMessages->count()!=0)
                            ({{Auth::user()->unseenMessages->count()}})
                            @endif
                        </a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#suggestionModal">Dërgo Sygjerim</a>
                    </li>
                            <li>
                                <a href="{{ route('suggestions.index') }}">Shiko Sygjerimet</a>
                            </li>
                </ul>
            </li>


            <div class="modal fade" id="suggestionModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="lineModalLabel">Send Suggestion</h4>
                        </div>
                        <div class="modal-body">

                            {!! Form::open(array('route' => 'suggestions.store','data-parsley-validate'=>'')) !!}
                            {{ Form::hidden('user_id',Auth::user()->id)}}
                            <div class="form-group">
                                {{ Form::label('title','Title:')}}
                                {{ Form::text('title',null,array('class' => 'form-control','required'=>'','maxlength'=>'50'))}}
                            </div>
                            <div class="form-group">
                                {{ Form::label('content','Content:')}}
                                {{ Form::textarea('content',null,array('class' => 'form-control','id'=>'exampleInputEmail1','required'=>'','maxlength'=>'600'))}}

                            </div>
                        {{ Form::submit('Send Suggestion',array('class' => 'btn btn-default'))}}
                        {!! Form::close() !!}
                        <!--
                                        			<form action="messages" method="post">
                                                        {{csrf_field()}}
                                <input name="reciver_id" type="hidden" value="{{Auth::user()->id}}">
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


            <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="glyphicon glyphicon-user"></b> {{Auth::user()->username}} </a>
        <ul class="dropdown-menu">
          <li><a href="/users/{{Auth::user()->id}}">Profili</a></li>
          <li><a href="/Kategorite">Kategoritë e Zgjedhura</a></li>
          <li><a href="/achievements">Shiko Arritjet</a></li>
          @if(Auth::user()->role === 'Admin')
          <li><a href="/categories/create">Krijo Kategori</a></li>
          <li><a href="/achievements/create">Krijo Arritje</a></li>
          @endif
          <li><a href="#">Kushtet</a></li>
          <li class="divider"></li>
          <li><a href="{{ url('/logout') }}"
                 onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">shkyçu
              </a>
              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
          </li>
        </ul>
      </li>
            @endif
    </ul>
  </div><!-- /.navbar-collapse -->

  </div>
</nav>