@extends('layouts.admin')


@section('content')



    @if(count($replies) > 0)
        <h1>replies</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Body</th>
                    <th>MainPost</th>
                    <th>Action</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($replies as $replay)
                <tr>
                    <td>{{$replay->id}}</td>
                    <td>{{$replay->author}}</td>
                    <td>{{$replay->email}}</td>
                    <td>{{$replay->body}}</td>
                    <td><a href="{{route('home.post', $replay->comment->post->id)}}">View Post</a></td>
                    <td>
                        @if($replay->is_active == 1)

                            {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$replay->id]]) !!}


                                <input type="hidden" name="is_active" value="0">

                                <div class="form-group">
                                    {!! Form::submit('Un-approved',['class' => 'btn btn-success']) !!}
                                </div>

                            {!! Form::close() !!}

                            @else

                            {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$replay->id]]) !!}


                                <input type="hidden" name="is_active" value="1">

                                <div class="form-group">
                                    {!! Form::submit('approved',['class' => 'btn btn-info']) !!}
                                </div>

                            {!! Form::close() !!}

                        @endif
                    </td>

                    <td>
                        <!-- delete replay -->
                        {!! Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$replay->id]]) !!}
                        
                        <div class="form-group">
                            {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


    @else
        <h1 class="text-center">No replies</h1>

    @endif

@stop