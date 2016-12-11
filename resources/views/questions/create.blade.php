 @extends('main')

  @section('title',' | Create Post')

  @section('stylesheets')

  	{!! Html::style('css/parsley.css')!!}

  @stop
  
  @section('content')

  	<div class="row">
  		<div class="col-md-8 col-md-offset-2">
  		<h1>Ask a new Question</h1>
  		<hr>
  		{!! Form::open(array('route' => 'questions.store','data-parsley-validate'=>'')) !!}
		    {{ Form::label('title','Title:')}}
		    {{ Form::text('title',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}

		    {{ Form::label('content','Content:')}}
		    {{ Form::textarea('content',null,array('class' => 'form-control','required'=>''))}}
        {{ Form::label('category','Category:')}}
        <select class="form-control">

          <option>1</option>
        </select>
		    {{ Form::submit('Post Question',array('class' => 'btn btn-success btn-lg btn-block','style' => 'margin-top : 20px' ))}}
		{!! Form::close() !!}
  		</div>
  	</div>

  @stop

  @section('scripts')
  	{!! Html::script('js/parsley.min.js')!!}
  @stop