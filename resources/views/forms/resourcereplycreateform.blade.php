{!! Form::open(['route' => ['resourcereplies.store' , 'method' => 'POST']]) !!}
{{ Form::label('content','Content:')}}
{{ Form::textarea('content',null,array('class' => 'form-control','required'=>'','maxlength'=>'500'))}}
<input type="hidden" name="id" value={{$resource->id}}>
{!! Form::submit('Post',['class' => 'btn btn-primary btn-block'])!!}

{!! Form::close()!!}