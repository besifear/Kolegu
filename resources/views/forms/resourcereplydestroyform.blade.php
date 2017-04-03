{!! Form::open(['route' => ['resourcereplies.destroy' , $resourceReply->id], 'method' => 'DELETE']) !!}
{{csrf_field()}}
{!! Form::submit('Delete',['class' => 'btn btn-danger btn-xs'])!!}
{!! Form::close()!!}