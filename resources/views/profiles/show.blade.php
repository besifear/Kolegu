  @extends('main')

  @section('title',' | Homepage')

  @section('content')

		<div class="row">
            <div class="col-lg-12">
                <div class="content-box">
                    <div class="panel-body">
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object dp img-circle" src="/images/profilepicture.png" style="width: 150px;height:150px;">
                                </a>
                                <div class="media-body">
                                    <h2 class="media-heading">{{$user->username}}<small> Developer</small></h2>
                                    <h4>Software Developer at <a href="#">Kitrrat.io</a></h4>
                                    <hr style="margin:8px auto">
                                    @foreach(App\SelectedCategory::where('user_id','=',$user->id)->get() as $selectedcategory)
                                      <span class="label label-info">{{$selectedcategory->category->name}}</span>
                                    @endforeach
                                </div>
                                <div class="media-side pull-right">
                                    <p><span class="glyphicon glyphicon-time"></span> Joined {{$user->created_at->diffForHumans()}}</p>
                                    @if($user->reputation==null)
                                    <p><span class="glyphicon glyphicon-certificate"></span> Reputation : 0             </p>
                                    
                                    @elseif($user->reputation!=null)
                                    <p><span class="glyphicon glyphicon-certificate"></span> Reputation : {{$user->reputation}}           </p>
                                    @endif
                                    <hr>
                                    <div class="centered">
                                        <a style="margin-right: 12px;" href="#" data-toggle="modal" data-target="#messageModal" class="btn btn-primary btn-sm center-block btn-block col-lg-5"><i class="fa fa-envelope"></i></a>
                                        
                                            <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                            	<div class="modal-content">
                                            		<div class="modal-header">
                                            			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            			<h4 class="modal-title" id="lineModalLabel">Send Message</h4>
                                            		</div>
                                            		<div class="modal-body">
                                                    <!-- Message Create Form Beginning -->
                                                    @include('forms.messagecreateform')
                                                    <!-- Message Create Form Ending-->
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
                                    <div class="hidden-xs">Resources</div>
                                </button>
                            </div>
                        </div>
                        <div class="well">
                              <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab1">
                                     <div class="content-box-large box-with-header">
                                      @foreach($questions as $question)
                                          <!-- Single Formatted Question Beginning -->
                                          @include('singles.questionsingle')
                                          <!-- Single Formatted Question Ending-->
                                      @endforeach
                                      <!-- Question Upvote/Downvote Form Beginning-->
                                      @include('forms.questionvoteform')
                                      <!-- Question Upvote/Downvote Form Ending-->
                                      </div>
                                      <div class="text-center">
                                        <!-- Questions Pagination Links Beginning-->
                                        {{ $questions->links() }}
                                        <!-- Questions Pagination Links Ending-->
                                      </div>
                                    </div>
                                    <div class="tab-pane fade in" id="tab2">

                                    <div class="content-box-large box-with-header">
                                      @foreach($answers as $answer)
                                          <!-- Single Formatted Answer Beginning -->
                                          @include('singles.answerprofilesingle')
                                          <!-- Single Formatted Answer Ending-->
                                      @endforeach
                                      <!-- Answer Upvote/Downvote Form Beginning-->
                                      @include('forms.answervoteform')
                                      <!-- Answer Upvote/Downvote Form Ending-->
                                      </div>
                                      <div class="text-center">
                                        <!-- Questions Pagination Links Beginning-->
                                        {{ $answers->links() }}
                                        <!-- Questions Pagination Links Ending-->
                                      </div> 
                                    </div>
                                    <div class="tab-pane fade in" id="tab3">
                                      @foreach($resources as $resource)
                                          <!-- Single Formatted Resource Beginning -->
                                          @include('singles.resourcesingle')
                                          <!-- Single Formatted Resource Ending-->
                                      @endforeach
                                      <!-- Resource Upvote/Downvote Form Beginning-->
                                      @include('forms.resourcevoteform')
                                      <!-- Resource Upvote/Downvote Form Ending-->
                                      <div class="text-center">
                                        <!-- Questions Pagination Links Beginning-->
                                        {{ $resources->links() }}
                                        <!-- Questions Pagination Links Ending-->
                                      </div>
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