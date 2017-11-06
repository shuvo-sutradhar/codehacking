@extends('layouts.admin')


@section('content')

	@if(Session::has('delete_post'))
		<div class="alert alert-danger">
			<strong>{{Session('delete_post')}}</strong>
		</div>
	@endif
	@if(Session::has('create_post'))
		<div class="alert alert-success">
			<strong>{{Session('create_post')}}</strong>
		</div>
	@endif
	@if(Session::has('update_post'))
		<div class="alert alert-success">
			<strong>{{Session('update_post')}}</strong>
		</div>
	@endif


	<h1>Posts</h1>

	<!-- users table -->
	<table class="table">
	    <thead>
	        <tr>
	            <th>Id</th>
	            <th>Photo</th>
	            <th>User</th>
	            <th>Category</th>
	            <th>Title</th>
	            <th>Body</th>
	            <th>Created</th>
	            <th>Updated</th>
	        </tr>
	    </thead>
	    <tbody>

	    	@if($posts)
	    		@foreach($posts as $post)
	    		
			        <tr class="active">
			            <td>{{ $post->id }}</td>
			            <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}"></td>
			            <td>
			            	<a href="{{route('admin.posts.edit', $post->id)}}">
			            	{{ $post->user->name}}
			            	</a>
			           </td>
			            <td>{{ $post->category ? $post->category->name : "Uncategoriged" }}</td>
			            <td>{{ $post->title }}</td>
			            <td>{{ str_limit($post->body,20) }}</td>
			            <td>{{ $post->created_at->diffForHumans() }}</td>
			            <td>{{ $post->updated_at->diffForHumans() }}</td>
			        </tr>

	        	@endforeach
	        @endif

	    </tbody>
	</table>

@stop