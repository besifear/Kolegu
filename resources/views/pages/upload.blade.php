 @extends('main')

  @section('title',' | Upload File')

  @section('stylesheets')

  	{!! Html::style('css/parsley.css')!!}

  @stop
  
  @section('content')

  	<div class="row">
  		<div class="col-md-8 col-md-offset-2">
  		<h1>Upload Resources</h1>
  		<hr>
  		{!! Form::open(array('route' => 'questions.store','data-parsley-validate'=>'')) !!}
		    {!! Form::label('Product Image') !!}
    {!! Form::file('image', null) !!}
        
		    {{ Form::submit('Post Question',array('class' => 'btn btn-success btn-lg btn-block','style' => 'margin-top : 20px' ))}}
		{!! Form::close() !!}
  		</div>
  	</div>

  @stop

  @section('scripts')
  	{!! Html::script('js/parsley.min.js')!!}
  @stop