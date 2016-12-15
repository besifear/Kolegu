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
                                    <h2 class="media-heading">Emna Mbiemna <small> Autist</small></h2>
                                    <h4>Software Developer at <a href="#">Kitrrat.io</a></h4>
                                    <hr style="margin:8px auto">

                                    <span class="label label-default">HTML5/CSS3</span>
                                    <span class="label label-default">jQuery</span>
                                    <span class="label label-info">Laravel</span>
                                    <span class="label label-default">Android</span>
                                </div>
                                <div class="media-side pull-right">
                                    <p><span class="glyphicon glyphicon-repeat"></span> Member for 10 months</p>
                                    <p><span class="glyphicon glyphicon-time"></span> Last seen 32 minutes ago</p>
                                    <hr>
                                    <div class="centered">
                                        <a href="#" data-toggle="modal" data-target="#messageModal" class="btn btn-primary btn-xs center-block"><i class="fa fa-envelope"></i> Send message</a>&nbsp;&nbsp;
                                            <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                            	<div class="modal-content">
                                            		<div class="modal-header">
                                            			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            			<h4 class="modal-title" id="lineModalLabel">Send Message</h4>
                                            		</div>
                                            		<div class="modal-body">

                                                        <!-- content goes here -->
                                            			<form>
                                                          <div class="form-group">
                                                            <label for="exampleInputEmail1">Subject</label>
                                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                                                          </div>
                                                          <div class="form-group">
                                                            <label for="exampleInputPassword1">Message</label>
                                                            <textarea class="form-control" id="exampleInputPassword1" placeholder=""></textarea>
                                                          </div>
                                                          <button type="submit" class="btn btn-default">Submit</button>
                                                        </form>

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
                                      <h3>This is tab 1</h3>
                                    </div>
                                    <div class="tab-pane fade in" id="tab2">
                                      <h3>This is tab 2</h3>
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