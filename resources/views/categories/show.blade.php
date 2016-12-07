@extends('main')

@section('title',' | View Category')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $category->name }}</h1>
			<p class="lead">{{$category->description}}</p>
		</div>
		<div class="col-md-4">
			<div class="well">
				<div class="row">
					<div class="col-sm-6">
						<a href="{{route('categories.edit', ['category'=>$category->name])}}" class="btn btn-primary btn-block">Edit</a>
					</div>
					<div class="col-sm-6">
					<a href="{{route('categories.destroy', ['category'=>$category->name])}}" class="btn btn-danger btn-block">Delete</a>﻿
					</div>
				</div>
			</div>
		</div>		
	</div>	
@stop

