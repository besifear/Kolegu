 @extends('main')

  @section('title',' | Homepage')

  @section('content')

    <div class="row">
            <div class="col-lg-12">
                <div class="content-box">
                    <div class="panel-body">
                            <div class="media">
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <a class="pull-left" href="#">
                                        <div id="profilePicDiv">
                                            <img
                                            @if(Auth::id() == $user->id)
                                            data-toggle="modal" data-target="#editAvatarModal"
                                            @endif
                                            class="media-object dp img-circle"
                                             src="/images/{{ $user->avatar }}" style="width: 150px;height:150px;">
                                            @if(Auth::id() == $user->id)
                                            <span id="editProfilePic">Click to edit avatar</span>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                                <div class="modal fade" id="editAvatarModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                              <h4 class="modal-title" id="lineModalLabel">Edit Avatar</h4>
                                          </div>
                                          <div class="modal-body">

                                              <!-- content goes here -->
                                              <form enctype="multipart/form-data" action="/profile" method="POST">
                                                <!--<div class="form-group text-center">
                                                    <label class="btn btn-file btn-block btn-danger">
                                                        <i class="glyphicon glyphicon-picture"></i> Browse a new avatar
                                                        <input type="file" name="avatar" style="display: none;">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    </label>
                                                </div>
                                                <input type="submit" class="btn btn-default btn-block">-->

                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button id="fake-file-button-browse" type="button" class="btn btn-default">
                                                            <span class="glyphicon glyphicon-file"></span> Shto foto
                                                        </button>
                                                    </span>
                                                    <input type="file" name="avatar" id="files-input-upload" style="display:none" accept="image/*">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="text" id="fake-file-input-name" disabled="disabled" placeholder="File not selected"
                                                           class="form-control">

                                                </div>
                                                <br>
                                                <input id="fake-file-button-upload" type="submit" class="btn btn-default btn-block" disabled value="Shto">
                                              </form>

                                          </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="media-body col-md-6 col-sm-4 col-xs-6">
                                    <h2 class="media-heading">{{$user->nickname}} <small> {{$user->role}} </small>
                                    <a style="font-size: 16px; text-decoration: none;" href="#" data-toggle="modal" data-target="#editProfileModal">
                                    <small style="color:#ff6666 !important;" class="glyphicon glyphicon-edit"></small><small style="color:#ff6666 !important;"> Edit</small>
                                    </a></h2>


                                    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Mbylle</span></button>
                                                    <h4 class="modal-title" id="lineModalLabel">Ndrysho Profilin</h4>
                                                </div>
                                                <div class="modal-body">

                                                    <!-- content goes here -->
                                                    {!! Form::open(['route'=>['users.update',$user->id],'method'=>'PUT','data-parsley-validate'=>'']) !!}
                                                    <div class = "form-group">
                                                    {!! Form::label('nickname','Nofka:') !!}
                                                    {!! Form::text('nickname',$user->nickname,['class'=>'form-control','maxlength'=>'50'])!!}
                                                    </div>
                                                    <div class = "form-group">
                                                    {!! Form::label('description','Përshkrimi:') !!}
                                                    {!! Form::textarea('description',null,['class'=>'form-control','maxlength'=>'1000'])!!}
                                                    </div>
                                                    <br>
                                                    {!! Form::submit('Përditso Profilin',array('class' => 'btn btn-default btn-md pull-left'))!!}
                                                    <br>
                                                    <br>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                          </div>
                                        </div>


                                    @if( $user->description )
                                        <h4>{{ $user->description }}</h4>
                                    @else

                                    <h4>Software Developer at <a href="#">Kitrrat.io</a></h4>
                                    @endif
                                    <hr style="margin:8px auto">
                                    @foreach($selectedcategories as $selectedcategory)
                                      <span class="label label-info">{{$selectedcategory->category->name}}</span>
                                    @endforeach
                                </div>
                                <div class="media-side col-md-2 col-sm-3 col-xs-12 pull-right">
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
                                    <div>Asked</div>
                                </button>
                            </div>

                            <div class="btn-group" role="group">
                                <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab">
                                    <div>Answered</div>
                                </button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab">
                                    <div>Resources</div>
                                </button>
                            </div>
                        </div>
                        <div class="well clearfix" style="padding: 0; margin-bottom: 0;">
                              <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab1">
                                     <div class="content-box-large box-with-header" style="margin-bottom: 0;">
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

                                    <div class="content-box-large box-with-header" style="margin-bottom: 0;">
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
                                      <div class="content-box-large box-with-header" style="margin-bottom: 0;">
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
            </div>
            <div class="col-lg-2 hidden-xs hidden-md">
                <div class="content-box">
                    <div class="panel-body">
                        Lista e Arritjeve:
                        <br>
                        @foreach($achievements as $achievement)
                          <div>
                            <hr>
                            <p>{{$achievement->name}} : </p>
                            <p>{{$achievement->reputationaward}} Reputacion </p>
                          </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            // Fake file upload
            document.getElementById('fake-file-button-browse').addEventListener('click', function () {
                document.getElementById('files-input-upload').click();
            });

            document.getElementById('files-input-upload').addEventListener('change', function () {
                document.getElementById('fake-file-input-name').value = this.value;

                document.getElementById('fake-file-button-upload').removeAttribute('disabled');
            });
        </script>

  @stop
