 @extends('main')

  @section('title',' | Create Post')

  @section('stylesheets')

  	{!! Html::style('css/parsley.css')!!}

  @stop
  
  @section('content')

  	<div class="row">

<div class="col-md-12">
        <div class="row">

          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">

                <div class="content-box-large clearfix">
                  <!-- forma per shtimin e pyetjeve -->
                  @include('questions.createquestionform')
                  <br><br>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <!-- Right Side Bar contains Rules -->
            @include('partials.rules')
          </div>

        </div>
      </div>
  	</div>

  @stop

  @section('scripts')
    <!-- TinyMce Javascript ka hapsire per optimizim me zevendsu me javascript file -->
  	@include('questions.tinymce')
  @stop