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
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">
                <div class="content-box-header">
                  <div class="panel-title">Actions</div>
                  <div class="pull-right">
                      <div class="btn-group">
                          <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                              Actions
                              <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu pull-right" role="menu">
                              <li><a href="/order/Newest">Newest</a>
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

              @foreach($questions as $question)
                <!-- Single Formatted Question Beginning -->
                @include('singles.questionsingle')
                <!-- Single Formatted Question Ending-->
              @endforeach
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
            <div class="col-md-4">
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