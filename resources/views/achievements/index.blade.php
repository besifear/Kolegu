@extends('main')

@section('title',' | All Achievements')

@section('content')
	
	
	<div class="row">
		<div class="col-md-8">
			<h1>All Achievements</h1>
		</div>
		<div class="col-md-4">
			<a href="{{ route('achievements.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Achievement</a>
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
					<th>Description</th>
					<th>Reputation Awarded</th>
					<th>Difficulty</th>
					<th></th>
				</thead>	
				<tbody>
					@foreach($achievements as $achievement)
						<tr>
							<td>{{ substr($achievement->description,0,50)}}{{strlen($achievement->description)>50 ? "..." : ""}}</td>
							<td>{{$achievement->description}}</td>
							<td>{{$achievement->difficulty}}</td>
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