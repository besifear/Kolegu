<div class="col-sm-6">
    {!! Form::open(['route' => ['resources.destroy' , $resource->id], 'method' => 'DELETE']) !!}

    {!! Form::submit('Delete',['class' => 'btn btn-danger btn-block'])!!}

    {!! Form::close()!!}
</div>