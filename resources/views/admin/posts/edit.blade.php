@extends('layouts.admin')


@section('content')

	@include('includes.tinyEditor')

	<h1>Edit Post</h1>
	<div class="row">
		<div class="col-md-3">
			<img src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="image" class="img-responsive img-border" />
		</div>

		<div class="col-sm-9">
		<!-- edit post form -->
		{!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}

		<div class="form-group">
			{!! Form::label('title','Title:') !!}
			{!! Form::text('title',null,['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('category_id','Category:') !!}
			{!! Form::select('category_id', $categories,null,['class' => 'form-control']) !!}
		</div>


		<div class="form-group">
			{!! Form::label('photo_id','Photo:') !!}
			{!! Form::file('photo_id',['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('body','Description:') !!}
			{!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>3]) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Update User',['class' => 'btn btn-primary col-sm-6']) !!}
		</div>

		{!! Form::close() !!}


		<!-- delete user post -->
		{!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]]) !!}

			<div class="form-group">
				{!! Form::submit('Delete User',['class' => 'btn btn-danger col-sm-6']) !!}
			</div>
		</div>
	</div>
	<div class="row">
		{!! Form::close() !!}
	</div>
	@include('includes.form_error')

@stop