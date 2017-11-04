@extends('layouts.admin')


@section('content')
	
	@if(Session::has('delete_user'))

		<div class="alert alert-danger">
			<strong>{{Session('delete_user')}}</strong>
		</div>

	@endif

	<h1>Users</h1>
	<form action="/del/user" method="post" class="form-inline">
		{{csrf_field()}}

		{{method_field('delete')}}
		<div class="form-group">
			<select name="checkBoxArray">
				<option value="Delete">Delete</option>
			</select>
		</div>
		<input type="submit" class="btn btn-primary">

	<!-- users table -->
	<table class="table">
	    <thead>
	        <tr>
	        	<th><input type="checkbox" id="options" name=""></th>
	            <th>Id</th>
	            <th>Image</th>
	            <th>Name</th>
	            <th>Email</th>
	            <th>Role</th>
	            <th>Status</th>
	            <th>Created</th>
	            <th>Updated</th>
	        </tr>
	    </thead>
	    <tbody>

	    	@if($users)
	    		@foreach($users as $user)
	    		
			        <tr class="active">
			        	<td><input type="checkbox" name="checkBoxArray[]" value="{{$user->id}}" class="checkboxes"></td>
			            <td>{{ $user->id }}</td>
			            <td>
			            	<img width="100" height="100" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/100x100'}}" alt="image" class="img-responsive img-border" />
			           	</td>
			            <td>
			            	<a href="{{route('admin.users.edit', $user->id)}}">
			            		{{ $user->name }}
			            	</a>
			            </td>
			            <td>{{ $user->email }}</td>
			            <td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
			            <td>{{ $user->is_active == 1 ? 'Active':'Not Active'}}</td>
			            <td>{{ $user->created_at->diffForHumans() }}</td>
			            <td>{{ $user->updated_at->diffForHumans() }}</td>
			        </tr>

	        	@endforeach
	        @endif

	    </tbody>
	</table>
	</form>

@stop

@section('footer')
	<script type="text/javascript">
		$(document).ready(function(){

			$('#options').click(function(){

				if(this.checked){

					$('.checkboxes').each(function(){
						this.checked = true;
					});

				}else{

					$('.checkboxes').each(function(){
						this.checked = false;
					});
					
				}
			});
			//  console.log('OKKKK');
		});

	</script>
@stop