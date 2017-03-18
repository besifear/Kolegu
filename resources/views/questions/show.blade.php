@extends('main')

@section('title',' | View Post')

@section('content')
	<div class="row">
		<div class="col-md-8">

    <h3>Question:</h3>
      <div class="content-box-large box-with-header clearfix">
        <!-- Show's a question -->
        @include('questions.singlequestion')
        @include('questions.voteform')   
      </div>

              <hr>
			<h4>Answers:</h4>
                  <br>
                  <div class="content-box-large box-with-header">
                  @foreach(App\Answer::where('question_id','=',$question->id)->get() as $answer)
                    @include('questions.singleanswer')
                  @endforeach

                      <form id="voteAnswer-form"   method="POST" style="display: none;">
                          <input type="hidden" id= "id" name="id" />
                          {{ csrf_field() }}
                      </form>

                    </div>
                  </ul>
                  <div id="result"></div>
                  <h3>Your answer</h3>
                  	@include('questions.createanswerform')	
					       <br><br>
		</div>
		@include('questions.sidebareditdelete')	
	</div>	
@stop

@section('scripts')
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-585fc7f429fa1254"></script>
@stop
