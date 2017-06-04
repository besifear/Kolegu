{!! Form::open([
	'route' => ['answers.store' ,
	'method' => 'POST'],
	'data-parsley-validate',
	'id' => 'tinyMCEForm',
]) !!}

{{ Form::textarea('content',null,array(
  	'class' => 'form-control','maxlength'=>'250',
	'pattern' => '\S(.*\S)?',
    'id' => 'content',
	'name' => 'content',
    'data-parsley-maxlength' => '250',
    'data-parsley-minlength' => '20',
    'data-parsley-required-message' => 'Përgjigjja nuk mund të jetë e zbrazët',
    'data-parsley-maxlength-message' => 'Përgjigjja mund të ketë më së shumti 250 karaktera',
    'data-parsley-minlength-message' => 'Përgjigjja nuk mund të përmbajë më pak se 20 karaktera',
    'data-parsley-trigger' => 'change focusout',

))}}
  <input type="hidden" name="id" value={{$question->id}}>
{!! Form::submit('Përgjigju',['class' => 'btn btn-primary btn-md pull-right', 'style' => 'margin-top : 10px'])!!}

{!! Form::close()!!}
