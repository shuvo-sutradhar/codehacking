@extends('layout.app')


@section('content')
	<h1>Contact Page</h1>

	@if ($person)
		<ul>
		@foreach($person as $people)

		<li>{{$people}}</li>

		@endforeach
		</ul>
	@endif

@stop