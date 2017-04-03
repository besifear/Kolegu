{!! Form::open(['route' => ['questions.destroy' , $question->id], 'method' => 'DELETE']) !!}

{!! Form::submit('Delete',['class' => 'btn btn-danger btn-block'])!!}

{!! Form::close()!!}
