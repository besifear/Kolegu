 @extends('main')

  @section('title',' | Create Post')

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
                  {!! Form::open(array('route' => 'questions.store','data-parsley-validate'=>'')) !!}
                      <h3 style="margin-bottom: 25px; text-align: left;">Ask a question</h3>

                      {{ Form::label('title','Title:')}}
                      {{ Form::text('title',null,array('class' => 'form-control','required'=>'','maxlength'=>'50'))}}
                      <br>
 
                      {{ Form::label('content','Content:')}}
                      {{ Form::textarea('content',null,array('class' => 'form-control','maxlength'=>'500'))}}
                      <br>

                      {{ Form::label('categoryname','Category:')}}
                      <select name="category_id" class="form-control" >
                      @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach  
                      </select>

                      {{ Form::submit('Post Question',array('class' => 'btn btn-primary btn-md pull-right','style' => 'margin-top : 20px' ))}}
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
                  <br>
                  <br>
                  Nese deshironi te shtoni imazhe klikoni kete link <a target="blank" href="http://imgur.com/upload"><b>Shto Foto!</b></a>
                  dhe pastaj beni copy&paste linkun ne permbajtje te pyetjes përmes butonit insert link.
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
    <script src="//cloud.tinymce.com/stable/tinymce.min.js?apiKey=qszzz8afw2q5rpi4vroy2wc1e3fhfb3ccnj6m2bu4nce66f8"></script>
        <script>
            tinymce.init({
                selector:'textarea',
                plugins: 'link codesample autoresize textcolor lists',
                codesample_languages: [
                    {text: 'HTML/XML', value: 'markup'},
                    {text: 'JavaScript', value: 'javascript'},
                    {text: 'CSS', value: 'css'},
                    {text: 'PHP', value: 'php'},
                    {text: 'Ruby', value: 'ruby'},
                    {text: 'Python', value: 'python'},
                    {text: 'Java', value: 'java'},
                    {text: 'C', value: 'c'},
                    {text: 'C#', value: 'csharp'},
                    {text: 'C++', value: 'cpp'}
                ],
                toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | forecolor link codesample ',
                menubar: false

            });
        </script>
  @stop