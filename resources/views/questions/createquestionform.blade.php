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
