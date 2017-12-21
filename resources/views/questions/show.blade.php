@extends('main')

@section('title',' | View Post')

@section('content')
	<div class="row">
		<div class="col-md-9">
      <div class="content-box-large clearfix">
        <!-- single formatted question beginning -->
        @include('singles.questionsingle')
        <!-- single formatted question ending -->
        <!-- question upvote/downvote form beginning-->
        @include('forms.questionvoteform')
        <!-- question upvote/downvote form beginning-->




		<h4>Përgjigjet</h4>
        <hr>
          <answer-list questionid="{{$question->id}}"></answer-list>
                    

                    @foreach(App\Answer::where('id','=',$question->answer_id)->get() as $answer)
                      <ul class = "event-list answer answer-container clearfix" id = "best-answer-container" style="list-style: none;">
                        <li id = "answer-{{$answer->id}}" class = "remove-best-answer" >
                            <!-- Single Formatted Answer Beginning -->
                            @include('singles.answersingle')
                            <!-- Single Formatted Answer Ending-->
                        </li>
                      </ul>
					             <hr>
                    @endforeach
                        <!-- Answer Upvote/Downvote Form Beginning-->
                        @include('forms.answervoteform')
                        <!-- Answer Upvote/Downvote Form Ending-->

		@foreach(App\Answer::where([['question_id','=',$question->id],['id','!=',$question->answer_id]])->get() as $answer)
		  <ul class = "event-list answer answer-container clearfix" style="list-style: none;">
		  <li id = "answer-{{$answer->id}}" class = "add-best-answer" >
			  <!-- Single Formatted Answer Beginning -->
			  @include('singles.answersingle')
			  <!-- Single Formatted Answer Ending-->
		  </li>
	  	  </ul>
		  <hr>
		@endforeach
			<!-- Answer Upvote/Downvote Form Beginning-->
			@include('forms.answervoteform')
			<!-- Answer Upvote/Downvote Form Ending-->


      </div>



                  <div id="result"></div>
                  <h3>Përgjigjja juaj</h3>
                    <!-- Answer Create Form Beginning-->
                  	@include('forms.answercreateform')
                    <!-- Answer Create Form Ending-->
					       <br><br>

		</div>
        <!-- Edit Delete Side Bar Beginning -->
          <div class="trending-side-bar col-md-3">
    <div class="content-box-header">
      <div class="panel-title">Pyetje Aktuale</div>
    </div>
    <div class="content-box-large box-with-header">
      <ul class="event-list trending-side-bar">
          @foreach($topquestions as $topquestion)
          <li class="trending-side-bar-item">
                      <div class="">
                          <a class="trendingquestion" href="/questions/{{$topquestion->id}}">{{substr($topquestion->title,0,20)}}{{strlen($topquestion->title)>20 ? "..." : ""}}</a>
                      </div>
         </li>
          @endforeach
      </ul>
    </div>
  </div>

        <!-- Edit Delete Side Bar Ending -->
    </div>
@stop

@section('scripts')
    <!-- Share on Social media side !!!NEEDS FIX o b-i!!!  Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-585fc7f429fa1254"></script>
    <!-- <script type="text/javascript" src="{{asset('js/choosebestanswer-ajax.js')}}">
    </script> -->

      <!-- TinyMce Javascript ka hapsire per optimizim me zevendsu me javascript file -->
    @include('questions.tinymce')
@stop
