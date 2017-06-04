
@foreach($questions as $question)

<div class="col-sm-3"></div>
	<div class="col-sm-6 kontenjer">
    	<br><br>
    	<img src="http://i.imgur.com/xkYJCRu.png">
		<hr width="50%">
	@foreach($questions as $question)

	<h1><a href="http://localhost:8000/questions/{{$question->id}}">{{$question->title}}</a></h1>
		<p> {{$question->content}}</p>
    @endforeach
	</div>
    <div class="col-sm-3"></div>
    @endforeach



