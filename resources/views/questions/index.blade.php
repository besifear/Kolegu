@extends('main')

  @section('title',' | Homepage')

  @section('content')
      <div class="row">
      <div class="col-md-2">
      <!-- Left Side Bar Beginning-->
      @include('partials.leftsidebar')
      <!-- Left Side Bar Ending-->
      </div>
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-12">
                <div class="content-box-header">
                  <div class="panel-title">Pyetjet</div>
                  <div class="pull-right">
                      <div class="btn-group">
                          <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                              Filtro
                              <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu pull-right" role="menu">
                              <li><a href="/order/Newest">Më të rejat</a>
                              </li>
                              <li><a href="/order/A-Z">A-Z</a>
                              </li>
                              <li><a href="/order/Z-A">Z-A</a>
                              </li>
                          </ul>
                      </div>
                  </div>
                </div>

                <div class="content-box-large box-with-header">
                    <ul class = "index-list">


              {{-- reactjs <div id= "questions-list"></div>--}}

              @foreach($questions as $question)

                    <li class = "index-list-item">
                        <!-- Single Formatted Question Beginning -->
                        @include('singles.questionsingle')
                        <!-- Single Formatted Question Ending-->
                    </li>

              @endforeach
                    </ul>
              <div class="text-center">
                <!-- Questions Pagination Links Beginning-->
                {{ $questions->links() }}
                <!-- Questions Pagination Links Ending-->
              </div>
                <!-- Question Upvote/Downvote Form Beginning-->
                @include('forms.questionvoteform')
                <!-- Question Upvote/Downvote Form Ending-->
              </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
                <div class="row">
                    <!-- Right Side Bar Beginning -->
                    @include('partials.rightsidebar')
                    <!-- Right Side Bar ending -->
                </div>
            </div>
        </div>
      </div>
      </div>

  @stop
