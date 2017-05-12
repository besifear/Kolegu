<?php
  function current_page($uri = "/") {
    return strstr(request()->path(), $uri);
  }
?>

<!-- Navigation Bar -->
<nav id="main-nav-bar" class="navbar navbar-default" role="navigation">
  <div class="shrinkednav">

  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header col-lg-7 col-md-12 col-sm-5 col-xs-12">

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <a class="navbar-brand" href="/"><img src="/images/tregomlogo.png" alt="logo" height="20px"></a>

    @include('partials.search')

  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse col-sm-4 col-xs-12 pull-right" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
        <li class="{{current_page('create') ? 'altactive' : '' }}"><a href="/questions/create"><b class="glyphicon glyphicon-send navIcons"></b> &nbsp;<span class="navButtonText">Pyet</span></a></li>
        <li class="{{current_page('asd') ? 'altactive' : '' }}"><a href="/"><b class="glyphicon glyphicon-comment navIcons"></b> &nbsp;<span class="navButtonText">Përgjigju</span></a></li>


        @if(Auth::guest())
            <li class="{{current_page('login') ? 'altactive' : '' }}"><a href="{{url('/login')}}"><b class="glyphicon glyphicon-log-in navIcons"></b> &nbsp;<span class="navButtonText">Kyçu</span></a></li>
            <li class="{{current_page('register') ? 'altactive' : '' }}"><a href="{{ url('/register') }}"><b class="fa fa-key fa-lg"></b> &nbsp;<span class="navButtonText">Regjistrohu</span></a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="glyphicon glyphicon-bell navIcons"></b> &nbsp;<span class="navButtonText">Njoftime</span> </a>
                <ul class="dropdown-menu">
                    <li><a href="/messages">Mesazhet
                            @if(Auth::user()->unseenMessages->count()!=0)
                            ({{Auth::user()->unseenMessages->count()}})
                            @endif
                        </a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#suggestionModal">Dërgo Sugjerim</a>
                    </li>
                            <li>
                                <a href="{{ route('suggestions.index') }}">Shiko Sugjerimet</a>
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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img class="media-object img-circle" src="/images/{{ Auth::user()->avatar }}" style="margin: -1px 5px 0px 0px; width: 24px; height:24px; float: left;">
                    <span class="navButtonText">{{Auth::user()->username}}</span></a>
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
