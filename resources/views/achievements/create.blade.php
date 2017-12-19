 @extends('main')

  @section('title',' | Krijo Arritje')

  @section('stylesheets')

  	{!! Html::style('css/parsley.css')!!}

  @stop
  
  @section('content')

  	<div class="row">
<div class="col-md-12">
        <div class="row">

          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">

                <div class="content-box-large clearfix">
                  {!! Form::open(array('route' => 'achievements.store','data-parsley-validate'=>'')) !!}
                      <h3 style="margin-bottom: 25px; text-align: left;">Krijo Arritje</h3>

                      {{ Form::label('description','Description:')}}
                      {{ Form::text('description',null,array('class' => 'form-control','required'=>'','maxlength'=>'300','placeholder'=>'Description'))}}
                      <br>
 
                      {{ Form::label('reputationaward','Reputation Award:')}}
                      {{ Form::number('reputationaward',null,array('class' => 'form-control','required'=>'','placeholder'=>'Reputation Awarded'))}}
                      <br>

                      {{ Form::label('difficulty','Difficulty:')}}
                      <select name="difficulty" class="form-control" >
                      
                        <option value="Easy">Easy</option>
                        <option value="Medium">Medium</option>
                        <option value="Hard">Hard</option>
                       
                      </select>

                      {{ Form::submit('Krijo Arritje',array('class' => 'btn btn-primary btn-md pull-right','style' => 'margin-top : 20px' ))}}
                  {!! Form::close() !!}
                  <br><br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  	</div>

  @stop

  @section('scripts')
  	{!! Html::script('js/parsley.min.js')!!}
  @stop