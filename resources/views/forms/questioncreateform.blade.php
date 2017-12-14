{!! Form::open(array('id' => 'tinyMCEForm', 'route' => 'questions.store','data-parsley-validate')) !!}
                      <h3 style="margin-bottom: 25px; text-align: left;">Shtro Pyetje</h3>

                      {{ Form::label('title','Titulli:')}}
                      {{ Form::text('title', $title ,[
                        'id' => 'title',
                        'required',
                        'class' => 'form-control',
                        'data-parsley-maxlength' => '50',
                        'data-parsley-minlength' => '5',
                        'data-parsley-required-message' => 'Pyetja duhet të ketë një titull',
                        'data-parsley-maxlength-message' => 'Titulli nuk mund të përmbajë më shumë se 50 karaktera',
                        'data-parsley-minlength-message' => 'Titulli nuk mund të përmbajë më pak se 5 karaktera',
                        'data-parsley-trigger' => 'change focusout',

                      ])}}
                      <br>

                      {{ Form::label('content','Përmbajtja:')}}
                      {{ Form::textarea('content',null,[
                        'id' => 'content',
                        'class' => 'form-control',
                        'maxlength' => '250',
                      ])}}
                      <br>

                      {{ Form::label('categoryname','Kategoria:')}}
                      <select name="category_id" class="form-control" >
                      @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                      </select>

                      {{ Form::submit('Shtro Pyetjen',array(
                        'id' => 'submit-question',
                        'class' => 'btn btn-primary btn-md pull-right',
                        'style' => 'margin-top : 20px',
                        ))}}
                  {!! Form::close() !!}
