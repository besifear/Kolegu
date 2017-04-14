@extends('main')

@section('title',' | All Achievements')

@section('content')
	
	
	<div class="row">
		<div class="col-md-8">
			<h1>Të Gjitha Arritjet</h1>
		</div>
		<div class="col-md-4">
			<a href="{{ route('achievements.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Krijo Arritje të Reja</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
		<hr>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>Përshkrimi</th>
					<th>Reputacioni që Shpërblehet</th>
					<th>Vështirësia</th>
					<th></th>
				</thead>	
				<tbody>
					@foreach($achievements as $achievement)
						<tr>
							<td>{{ substr($achievement->description,0,50)}}{{strlen($achievement->description)>50 ? "..." : ""}}</td>
							<td>{{$achievement->reputationaward}} Pikë</td>
							<!--Duhet me u permirsu ne db kush te sheh !!!
								easy medim hard duhet me i kthy ne shqip -->
							<td>
								@if($achievement->difficulty === 'easy')
									Lehtë
								@elseif($achievement->difficulty === 'medium')
									Mesatare
								@else
									Vështirë
								@endif
							</td>

							<td>  
							@if(Auth::check())
                                  @if(Auth::user()->role=='Admin')


                                      {!! Form::open(['route' => ['achievements.destroy' , $achievement->id], 'method' => 'DELETE']) !!}

                                      {!! Form::submit('Delete',['class' => 'btn btn-danger btn-md '])!!}

                                      {!! Form::close()!!}


                                  @endif
                              @endif </td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@stop