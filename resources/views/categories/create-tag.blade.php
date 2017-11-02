 @extends('main')

  @section('title',' | Create Categorys')

  @section('stylesheets')

  	{!! Html::style('css/parsley.css')!!}

  @stop
  
  @section('content')

  	<div class="row">
  		<div class="col-md-8 col-md-offset-2">
  		<h1>Krijo Etikete të re</h1>
  		<hr>
  		{!! Form::open(array('route' => 'categories.store','data-parsley-validate'=>'')) !!}

		    {{ Form::label('name','Emri:')}}
		    {{ Form::text('name',null,array(
        'class' => 'form-control',
        'required'=>'',
        'maxlength'=>'50',
        'data-parsley-maxlength' => '50',
        'data-parsley-minlength' => '2',
        'data-parsley-required-message' => 'Titulli nuk mund të jetë e zbrazët',
        'data-parsley-maxlength-message' => 'Titulli mund të ketë më së shumti 50 karaktera',
        'data-parsley-minlength-message' => 'Titulli nuk mund të përmbajë më pak se 5 karakte ra',
        'data-parsley-trigger' => 'change focusout',
 
      ))}}


        {{ Form::label('categoryparent','Kategoria Prind:')}}
          <select name="category_id" class="form-control" >
          @foreach($categories as $category)
          
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
          </select>

		    {{ Form::label('description','Përshkrimi:')}}
		    {{ Form::textarea('description',null,array(
          'class' => 'form-control',
          'required'=>'',
          'maxlength'=>'200',
          'data-parsley-maxlength' => '250',
          'data-parsley-minlength' => '25',
          'data-parsley-required-message' => 'Përshkrimi nuk mund të jetë i zbrazët',
          'data-parsley-maxlength-message' => 'Përshkrimi mund të ketë më së shumti 250 karaktera',
          'data-parsley-minlength-message' => 'Përshkrimi nuk mund të përmbajë më pak se 25 karakte ra',
          'data-parsley-trigger' => 'change focusout',
  
        ))}}


		    {{ Form::submit('Krijo Etiketën',array('class' => 'btn btn-primary btn-lg btn-block','style' => 'margin-top : 20px' ))}}
		{!! Form::close() !!}
  		</div>
  	</div>

  @stop

  @section('scripts')
  	{!! Html::script('js/parsley.min.js')!!}
  @stop