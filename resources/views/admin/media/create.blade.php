@extends('layouts.admin')



@section('styles')

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css">

@stop



@section('content')

	<h1>Uplaod Media</h1>
	{!!  Form::open(['method'=>'POST', 'action'=>'AdminMediaController@store','class'=>'dropzone'])  !!}



	{!! Form::close() !!}

@stop



@section('scripts')

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js" ></script>

@stop