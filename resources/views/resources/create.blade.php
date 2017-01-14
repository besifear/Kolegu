 @extends('main')

  @section('title',' | Upload Resources')

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
                  {!! Form::open(array('route' => 'resources.store','files' => true,'data-parsley-validate'=>'')) !!}
                      <h3 style="margin-bottom: 25px; text-align: left;">Upload Resources</h3>

                      {{ Form::label('title','Title:')}}
                      {{ Form::text('title',null,array('class' => 'form-control','required'=>'','maxlength'=>'50'))}}
                      <br>
 
                      {{ Form::label('content','Content:')}}
                      {{ Form::textarea('content',null,array('class' => 'form-control','required'=>'','maxlength'=>'500'))}}
                      <br>

                      {{ Form::label('categoryname','Category:')}}
                      <select name="category_id" class="form-control" >
                      @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach  
                      </select>
                      <br>
                      <input type="file" name="filefield" >

                      {{ Form::submit('Post Resources',array('class' => 'btn btn-primary btn-md pull-right','style' => 'margin-top : 20px' ))}}
                  {!! Form::close() !!}
                  <br><br>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-12">
                <div class="content-box-header">
                  <div class="panel-title">Rules</div>
                </div>
                <div class="content-box-large box-with-header">
                  Ju lutemi postoni pyetje serioze.
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