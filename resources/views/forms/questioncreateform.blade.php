{!! Form::open(array('route' => 'questions.store','data-parsley-validate')) !!}
                      <h3 style="margin-bottom: 25px; text-align: left;">Shtro Pyetje</h3>

                      {{ Form::label('title','Titulli:')}}
                      {{ Form::text('title',null,[
                        'id' => 'title',
                        'required',
                        'class' => 'form-control',
                        'maxlength' => '50',
                        'data-parsley-required-message' => 'Pyetja duhet të ketë një titull!',
                        'data-parsley-trigger' => 'change focusout'
                      ])}}
                      <br>
 
                      {{ Form::label('content','Përmbajtja:')}}
                      {{ Form::textarea('content',null,[
                        'id' => 'content',
                        'class' => 'form-control',
                        'maxlength' => '500',
                      ])}}
                      <br>

                      {{ Form::label('categoryname','Kategoria:')}}
                      <select name="category_id" class="form-control" >
                      @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach  
                      </select>

                      {{ Form::submit('Shtro Pyetjën',array(
                        'id' => 'submit-question',
                        'class' => 'btn btn-primary btn-md pull-right',
                        'style' => 'margin-top : 20px',
                        ))}}
                  {!! Form::close() !!}
