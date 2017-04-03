{!! Form::open(['route' => ['answers.store' , 'method' => 'POST']]) !!}

  {{ Form::textarea('content',null,array('class' => 'form-control','required'=>'','maxlength'=>'500'))}}
  <input type="hidden" name="id" value={{$question->id}}>
{!! Form::submit('Post',['class' => 'btn btn-primary btn-block'])!!}

{!! Form::close()!!}  
