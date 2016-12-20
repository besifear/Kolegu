@extends('main')

@section('title',' | Homepage')

@section('content')
<div class="row">

    <div class="content-box">
        <div class="panel-title">
            <h4>Suggestions</h4>
        </div>
        <div class="panel-body">
            <div class="row">
                    <!-- Split button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">
                            <div class="checkbox" style="margin: 0;">
                                <label> Select all
                                    <input id="checkAllBox" style="margin-left: -20px !important;" type="checkbox" name="sample" class="selectall"
                                           onclick="
                                           var ids=document.getElementsByName('ids[]');

                                           if(checkAllBox=document.getElementById('checkAllBox').checked===true)
                                               for(var i=0;i<ids.length;i++)
                                                    ids[i].checked=true;
                                           else
                                               for(var i=0;i<ids.length;i++)
                                                    ids[i].checked=false;"
                                           >
                                </label>
                            </div>
                        </button>
                        <!--<button style="height: 34px;" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">All</a></li>
                            <li><a href="#">None</a></li>
                            <li><a href="#">Read</a></li>
                            <li><a href="#">Unread</a></li>
                            <li><a href="#">Starred</a></li>
                            <li><a href="#">Unstarred</a></li>
                        </ul>-->
                    </div>
                    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Refresh"
                            onclick="history.go(0);">
                        &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;&nbsp;</button>
                    <!-- Single button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            More <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">

                            <li><a onclick="event.preventDefault();
                                   document.getElementById('messagesForm').setAttribute('action','/deletemessages');
                                   document.getElementById('messagesForm').submit();">Delete all marked
                                </a>


                            </li>
                            <li class="divider"></li>
                            <li><a
                                        onclick="event.preventDefault();
                                        document.getElementById('messagesForm').setAttribute('action','/markasread');
                                        document.getElementById('messagesForm').submit();">Mark all as read
                                </a>
                            </li>

                        </ul>
                    </div>
                <form id="orderByForm" action="messagesorderby" style="display:none;" method="post" >
                    {{csrf_field()}}
                    <input type="hidden" id="orderBy" name="orderBy">
                    <input type="hidden" id="ascOrDsc" name="ascOrDsc">
                </form>

                <div class="btn-group" style="float:right;">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Order By<span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">

                        <li><a onclick="event.preventDefault();
                                   document.getElementById('orderBy').setAttribute('value','created_at');
                                   document.getElementById('ascOrDsc').setAttribute('value','desc');
                                   document.getElementById('orderByForm').submit();"> Newest
                            </a>
                        </li>

                        <li class="divider"></li>
                        <li><a
                                    onclick="event.preventDefault();
                                        document.getElementById('orderBy').setAttribute('value','created_at');
                                        document.getElementById('ascOrDsc').setAttribute('value','asc');
                                        document.getElementById('orderByForm').submit();">Oldest
                            </a>
                        </li>

                        <li class="divider"></li>
                        <li><a
                                    onclick="event.preventDefault();
                                        document.getElementById('orderBy').setAttribute('value','sender_id');
                                        document.getElementById('ascOrDsc').setAttribute('value','asc');
                                        document.getElementById('orderByForm').submit();">A-Z
                            </a>
                        </li>

                        <li class="divider"></li>
                        <li><a
                                    onclick="event.preventDefault();
                                        document.getElementById('orderBy').setAttribute('value','sender_id');
                                        document.getElementById('ascOrDsc').setAttribute('value','desc');
                                        document.getElementById('orderByForm').submit();">Z-A
                            </a>
                        </li>



                    </ul>
                </div>
                    <!--<div class="pull-right">
                        <span class="text-muted"><b>1</b>–<b>50</b> of <b>277</b></span>
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </button>
                            <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </button>
                        </div>
                    </div>-->
            </div>
            <hr>

            <form id="messagesForm" action="" method="POST">
                @foreach($suggestions as $suggestion)
            <div class="row">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                            <div class="list-group" >

                                <div class="list-group-item" >
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="ids[]" id="ids[]" value="{{$suggestion->id}}">
                                        </label>
                                    </div>
                                    <a href="/suggestions/{{$suggestion->id}}" >
                                        <span class="name" style="min-width: 120px;
                                            display: inline-block;">{{$suggestion->sender->username}}</span> <span class="">{{$suggestion->title}}</span>
                                        <span class="text-muted" style="font-size: 12px;">{{$suggestion->content}}</span>
                                        <span
                                            class="badge pull-right">{{$suggestion->created_at->diffForHumans()}}</span>
                                            <span class="pull-right"><span class="glyphicon glyphicon-ok">
                                            </span></span>
                                    </a>
                                </div>
    <!--
                                <div class="modal fade" id="inboxModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                              <h4 class="modal-title" id="lineModalLabel">Message</h4>
                                          </div>
                                          <div class="modal-body">


                                              <ul class="event-list">
                                                <li>
                                                  <div class="info">
                                                    <h2 class="title">Question</h2>
                                                    <hr>
                                                    <p class="desc">Description</p>
                                                    <ul style="width: auto; float: left;" class="pull-right">
                                                      <li><p style="font-size: 9pt;">Sent by <a>IlliPilli</a></p></li>
                                                    </ul>
                                                  </div>
                                                </li>
                                              </ul>

                                          </div>
                                      </div>
                                    </div>
                                </div>
                                -->
                            </div>
                        </div>
                    </div>

            </div>
                @endforeach
                {{ csrf_field() }}
            </form>

        </div>
    </div>

</div>

@stop
