@extends('layouts.blog-post')



@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>


    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at->diffForHumans() }}</p>

    <hr>

    <!-- Preview Image -->
    <img style="width: 900px;height: 400px;border: 3px solid #ddd;border-radius: 4px;box-shadow: 0px 0px 4px #000" class="img-responsive" src="{{$post->photo ? $post->photo->file : $post->placeholderImage()}}" alt="">

    <hr>

    <!-- Post Content -->
   <!--  <p>{{$post->body}}</p> -->
   <p>{!! $post->body !!}</p>

    <hr>

@if(Auth::check())
    <!-- Blog Comments -->
    <div class="token">
        @if(Session::has('comment_message'))
            {{session('comment_message')}}
        @endif
    </div>
    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        {!! Form::open(['method'=>'POST','action'=>'PostCommentController@store']) !!}

            <input type="hidden" name="post_id" value="{{$post->id}}" />
            <div class="form-group">
                {!! Form::textarea('body', null,['class'=>'form-control','rows'=>3]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Submit Comment', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endif

    <hr>

    <!-- Posted Comments -->
@if(count($comments) > 0)

    @foreach($comments as $comment)
    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img width="60" height="60" class="media-object" src="{{$comment->photo}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
            {{$comment->body}}
                @if(Auth::check())
                    <div class="comment-replay-container">
                        <button class="toggle-replay btn btn-primary pull-right">Reply</button>
                        <div class="comment-replay">
                            {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}
                                <input type="hidden" name="comment_id" value="{{$comment->id}}" />
                                <div class="form-group">
                                    <!-- {!! Form::label('body', 'Replay:') !!} -->
                                    {!! Form::textarea('body', null,['class'=>'form-control','rows'=>2]) !!}
                                
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                @endif

            @if(count($comment->replies) > 0)

            @foreach($comment->replies as $reply)

            @if($reply->is_active == 1)
            <!-- Nested Comment -->
            <div id="nested-comment" class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="{{$reply->photo}}" height="60" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$reply->author}}
                        <small>{{$reply->created_at->diffForHumans()}}</small>
                    </h4>
                    {{$reply->body}}
                </div>
            </div>
            @endif

            <!-- End Nested Comment -->
            

            @endforeach

            @endif

        </div>
    </div>
    @endforeach
@endif


@stop

@section('catagory')

    <!-- Catagory show -->
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                @foreach($categories as $cagagory)

                <li>
                    <a href="#">{{$cagagory->name}}</a>
                </li>

                @endforeach
            </ul>
        </div>
    </div>
    <!-- /.row -->

@stop


@section('scripts')

<script type="text/javascript">
    $(".comment-replay-container .toggle-replay").click(function(){

        $(this).next().slideToggle("slow");

    });



</script>

@stop




