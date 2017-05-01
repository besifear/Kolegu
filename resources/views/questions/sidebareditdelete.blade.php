<br>
<br>
<br>
<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At :</dt>
					<dd>{{ date('j/m/Y H:i',strtotime ($question->created_at)) }}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('j/m/Y H:i',strtotime ($question->updated_at)) }}</dd>
				</dl>

                @if(Auth::check())
                @if(Auth::user()->id==$question->user_id)
                    <hr>
      				<div class="row">
      					<div class="col-sm-6">
      						<a href="#" class="btn btn-primary btn-block">Edit</a>
      					</div>
      						<div class="col-sm-6">
      							{!! Form::open(['route' => ['questions.destroy', $question->id], 'method' => 'DELETE']) !!}
								{!! Form::hidden('id', $question->id , ['name' => 'id']) !!}
      							{!! Form::submit('Delete',['class' => 'btn btn-danger btn-block'])!!}

      							{!! Form::close()!!}
						</div>
				</div>
                    @endif
                    @endif
			</div>
		</div>	