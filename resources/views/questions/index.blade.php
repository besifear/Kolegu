@extends('main')

  @section('title',' | Homepage')

  @section('content')

      <div class="row">
      <div class="col-md-2">
      <!-- Left Side Bar -->
      @include('partials.leftsidebar')
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

              <!-- Pyetjet me foorloop -->
              @foreach($questions as $question)
                @include('questions.singlequestion')
              @endforeach
              <div class="text-center">
                  {{ $questions->links() }}
              </div>
                @include('questions.voteform')
              </div>
              </div>
            </div>
          </div>
            <div class="col-md-4">
                <div class="row">
                    <!-- Right Side Bar Begining -->
                    @include('partials.rightsidebar')
                    <!-- Right Side Bar ending -->
                </div>
            </div>
        </div>
      </div>
      </div>

  @stop