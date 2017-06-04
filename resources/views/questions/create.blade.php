 @extends('main')

  @section('title',' | Create Post')

  @section('stylesheets')


  @stop

  @section('content')

  	<div class="row">

<div class="col-md-12">
        <div class="row">

          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">

                <div class="content-box-large clearfix">
                  <!-- Question create Form Beginning-->
                  @include('forms.questioncreateform')
                  <!-- Question create Form Ending-->
                  <br><br>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <!-- Right Rules Side Bar Beginning -->
            @include('partials.rules')
            <!-- Right Rules Side Bar Ending -->
          </div>

        </div>
      </div>
  	</div>

  @stop

  @section('scripts')
    <!-- TinyMce Javascript ka hapsire per optimizim me zevendsu me javascript file -->
  @include('questions.tinymce')
  @stop
