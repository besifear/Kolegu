 @extends('main')

  @section('title',' | Create Post')

  @section('stylesheets')

  	{!! Html::style('css/parsley.css')!!}

  @stop
  
  @section('content')

  	<div class="row">
  		<div class="col-md-8 col-md-offset-2">
  		<h1>Create New Category</h1>
  		<hr>
  		{!! Form::open(array('route' => 'categories.store','data-parsley-validate'=>'')) !!}
		    {{ Form::label('name','Name:')}}
		    {{ Form::text('name',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}

		    {{ Form::label('description','Description:')}}
		    {{ Form::textarea('description',null,array('class' => 'form-control','required'=>''))}}

		    {{ Form::submit('Create Category',array('class' => 'btn btn-success btn-lg btn-block','style' => 'margin-top : 20px' ))}}
		{!! Form::close() !!}
  		</div>
  	</div>

  @stop

  @section('scripts')
  	{!! Html::script('js/parsley.min.js')!!}
  @stop