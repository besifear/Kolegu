@foreach($questions as $question)

<h1><a href="http://localhost:8000/questions/{{$question->id}}">{{$question->title}}</a></h1>
<hr/>
<p> {{$question->content}}</p>
<hr/>
    @endforeach
