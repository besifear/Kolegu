@extends('main')

@section('title',' | View Post')

@section('content')
	<div class="row">
		<div class="col-md-8">

    <h3>Question:</h3>
      <div class="content-box-large box-with-header clearfix">
        <!-- Single Formatted Question Beginning -->
        @include('singles.questionsingle')
        <!-- Single Formatted Question Ending -->
        <!-- Question Upvote/Downvote Form Beginning-->
        @include('forms.questionvoteform')
        <!-- Question Upvote/Downvote Form Beginning-->
      </div>

              <hr>
			<h4>Answers:</h4>
                  <br>
                  <div class="content-box-large box-with-header">
                  @foreach(App\Answer::where('question_id','=',$question->id)->get() as $answer)
                      <!-- Single Formatted Answer Beginning -->
                      @include('singles.answersingle')
                      <!-- Single Formatted Answer Ending-->
                  @endforeach
                      <!-- Answer Upvote/Downvote Form Beginning-->
                      @include('forms.answervoteform')
                      <!-- Answer Upvote/Downvote Form Ending-->


                    </div>
                  </ul>
                  <div id="result"></div>
                  <h3>Your answer</h3>
                    <!-- Answer Create Form Beginning-->
                  	@include('forms.answercreateform')
                    <!-- Answer Create Form Ending-->
					       <br><br>
		</div>
        <!-- Edit Delete Side Bar Beginning -->
		@include('questions.sidebareditdelete')
        <!-- Edit Delete Side Bar Ending -->
    </div>
@stop

@section('scripts')
    <!-- Share on Social media side !!!NEEDS FIX o b-i!!!  Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-585fc7f429fa1254"></script>
@stop
