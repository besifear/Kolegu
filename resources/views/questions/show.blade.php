@extends('main')

@section('title',' | View Post')

@section('content')
	<div class="row">
		<div class="col-md-8">

    <h3>Pyetja:</h3>
      <div class="content-box-large box-with-header clearfix">
        <!-- single formatted question beginning -->
        @include('singles.questionsingle')
        <!-- single formatted question ending -->
        <!-- question upvote/downvote form beginning-->
        @include('forms.questionvoteform')
        <!-- question upvote/downvote form beginning-->
      </div>

      <div id="best-answer" class="content-box-large box-with-header">
      
                  @foreach(App\Answer::where('id','=',$question->answer_id)->get() as $answer)
                    <ul id = "best-answer-container">
                    <li id = "answer-{{$answer->id}}" class = "remove-best-answer" >
                      <h4>Përgjigjja e saktë</h4>
                        <!-- Single Formatted Answer Beginning -->
                        @include('singles.answersingle')
                        <!-- Single Formatted Answer Ending-->
                    </li>
                    </ul>
                  @endforeach
                      <!-- Answer Upvote/Downvote Form Beginning-->
                      @include('forms.answervoteform')
                      <!-- Answer Upvote/Downvote Form Ending-->


      </div>        
			<h4>Përgjigjjet:</h4>
                  <br>
                  <div id="answers-list" class="content-box-large box-with-header">
                  @foreach(App\Answer::where([['question_id','=',$question->id],['id','!=',$question->answer_id]])->get() as $answer)
                    <ul class = "answer-container">
                    <li id = "answer-{{$answer->id}}" class = "add-best-answer" >
                        <!-- Single Formatted Answer Beginning -->
                        @include('singles.answersingle')
                        <!-- Single Formatted Answer Ending-->
                    </li>
                    </ul>
                  @endforeach
                      <!-- Answer Upvote/Downvote Form Beginning-->
                      @include('forms.answervoteform')
                      <!-- Answer Upvote/Downvote Form Ending-->


                    </div>
                  </ul>
                  <div id="result"></div>
                  <h3>Përgjigjja juaj</h3>
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
    <!-- <script type="text/javascript" src="{{asset('js/choosebestanswer-ajax.js')}}"> 
    </script> -->
@stop
