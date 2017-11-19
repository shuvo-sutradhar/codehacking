@extends('layouts.admin')


@section('content')

	@if(Session::has('UploadPhotoDelete'))
		<div class="alert alert-danger">
			<strong>{{Session('UploadPhotoDelete')}}</strong>
		</div>
	@endif
	

	<h1>Photo</h1>
@if($photos)

	<form action="/admin/delete/media" method="post" class="form-inline">

		{{csrf_field()}}
		{{method_field('delete')}}
		
		<div class="form-group">
			<select name="checkBoxArray" id="" class="form-control">
				<option value="">Delete</option>
			</select>			
		</div>
		<div class="form-group">
			<input type="submit" name="delete_all" class="btn btn-primary">		
		</div>



		<!-- users table -->
		<table class="table">
		    <thead>
		        <tr>
		            <th><input type="checkbox" id="options" ></th>
		            <th>Id</th>
		            <th>Name</th>
		            <th>Path</th>
		            <th>Created</th>
		            <th>Delete</th>
		        </tr>
		    </thead>
		    <tbody>


		    		@foreach($photos as $photo)
				        <tr class="active">
				        	
		    				<td>
		    					<input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}">
		    				</td>
				            <td>{{ $photo->id }}</td>
				            <td><img height="50" src="{{$photo->file ? $photo->file : 'http://placehold.it/400x400'}}"></td>
				            <td>{{ $photo->file }}</td>
				            <td>{{ $photo->created_at->diffForHumans() }}</td>
				            <td>
			            		<div class="form-group">
			            			<input type="hidden" name="photo" value="{{$photo->id}}">
			            			<input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
			            		</div>
				            </td>
				        </tr>

		        	@endforeach


		    </tbody>
		</table>

	</form>


@endif

@stop


@section('scripts')
	<script type="text/javascript">
		
		$(document).ready(function(){

			$('#options').click(function(){
				if(this.checked) {
					$('.checkBoxes').each(function(){
						this.checked = true;
					});
				} else {
					$('.checkBoxes').each(function(){
						this.checked = false;
					});
				}
			});

		});

	</script>
@stop