@extends('main')

@section('title',' | Homepage')

@section('content')
<div class="row">

        <div class="content-box">
            <div class="panel-title">
                <h4>Inbox</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                        <!-- Split button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-default">
                                <div class="checkbox" style="margin: 0;">
                                    <label> Select all
                                        <input style="margin-left: -20px !important;" type="checkbox" name="sample" class="selectall">
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
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Refresh">
                            &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;&nbsp;</button>
                        <!-- Single button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                More <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Delete selected messages</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Mark all as read</a></li>
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
                <div class="row">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="sample[]">
                                            </label>
                                        </div>
                                        <span class="name" style="min-width: 120px;
                                            display: inline-block;">Bhaumik Patel</span> <span class="">This is big title</span>
                                        <span class="text-muted" style="font-size: 12px;">- Hi hello how r u ?</span> <span
                                            class="badge">12:10 AM</span> <span class="pull-right"><span class="glyphicon glyphicon-ok">
                                            </span></span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="sample[]">
                                            </label>
                                        </div>
                                        <span class="name" style="min-width: 120px;
                                            display: inline-block;">Bhaumik Patel</span> <span class="">This is big title</span>
                                        <span class="text-muted" style="font-size: 12px;">- Hi hello how r u ?</span> <span
                                            class="badge">12:10 AM</span> <span class="pull-right"><span class="glyphicon glyphicon-ok">
                                            </span></span>
                                    </a>
                                    <div class="modal fade" id="inboxModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                  <h4 class="modal-title" id="lineModalLabel">Message</h4>
                                              </div>
                                              <div class="modal-body">

                                                  <!-- content goes here -->

                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
</div>

@stop
