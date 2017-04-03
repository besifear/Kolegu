{!! Form::open(array('route' => 'messages.store','data-parsley-validate'=>'')) !!}
{{ Form::hidden('reciever_id',$user->id)}}
<div class="form-group">
    {{ Form::label('subject','Subject:')}}
    {{ Form::text('subject',null,array('class' => 'form-control','required'=>'','maxlength'=>'50'))}}
</div>
<div class="form-group">
    {{ Form::label('content','Message:')}}
    {{ Form::textarea('content',null,array('class' => 'form-control','id'=>'exampleInputEmail1','required'=>'','maxlength'=>'500'))}}

</div>
{{ Form::submit('Send Message',array('class' => 'btn btn-default'))}}
{!! Form::close() !!}