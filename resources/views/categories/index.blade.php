@extends('main')

@section('title',' | All Categories')

@section('content')
	
	
	<div class="row">
		<div class="col-md-10">
			<h1>All Categories</h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('categories.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Category</a>
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
					<th>Name</th>
					<th>Description</th>
					<th></th>
				</thead>	
				<tbody>
					@foreach($categories as $category)
						<tr>
							<td>{{$category->Name}}</td>
							<td>{{ substr($category->Description,0,50)}}{{strlen($category->Description)>50 ? "..." : ""}}</td>
							<td> <a href="#" class="btn btn-default btn-sm">View</a> <a href="#" class="btn btn-default btn-sm">Edit</a> </td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@stop