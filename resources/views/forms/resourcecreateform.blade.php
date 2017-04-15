{!! Form::open(array('route' => 'resources.store','files' => true,'data-parsley-validate'=>'')) !!}
<h3 style="margin-bottom: 25px; text-align: left;">Upload Resources</h3>

{{ Form::label('title','Titulli:')}}
{{ Form::text('title',null,array('class' => 'form-control','required'=>'','maxlength'=>'50'))}}
<br>

{{ Form::label('content','Përmbajtja:')}}
{{ Form::textarea('content',null,array('class' => 'form-control','required'=>'','maxlength'=>'500'))}}
<br>

{{ Form::label('categoryname','Kategoria:')}}
<select name="category_id" class="form-control">
    @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
</select>
<br>

<div class="input-group">
                                <span class="input-group-btn">
                                    <button id="fake-file-button-browse" type="button" class="btn btn-default">
                                        <span class="glyphicon glyphicon-file"></span> Shto File
                                    </button>
                                </span>
    <input type="file" name="filefield" id="files-input-upload" style="display:none">
    <input type="text" id="fake-file-input-name" disabled="disabled" placeholder="File not selected"
           class="form-control">

</div>

<script type="text/javascript">
    // Fake file upload
    document.getElementById('fake-file-button-browse').addEventListener('click', function () {
        document.getElementById('files-input-upload').click();
    });

    document.getElementById('files-input-upload').addEventListener('change', function () {
        document.getElementById('fake-file-input-name').value = this.value;

        document.getElementById('fake-file-button-upload').removeAttribute('disabled');
    });
</script>

{{ Form::submit('Shto Resoursin',array('class' => 'btn btn-primary btn-md pull-right','style' => 'margin-top : 20px' ))}}
{!! Form::close() !!}