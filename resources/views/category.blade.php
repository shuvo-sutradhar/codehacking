@extends('layouts.blog-home')

@section('blogPost')

    <h1 class="page-header">
        {{$category->name}}
        <small>Recent Posts</small>
    </h1>
    @if($posts)
        @foreach($posts as $post)
    <!-- First Blog Post -->
    <div class="blogWrap">
        <h2>
            <a href="#">{{$post->title}}</a>
        </h2>
        <p class="lead">
            by <a href="index.php">{{ $post->user->name}}</a>
            
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at->diffForHumans() }}</p>
        <hr>
        <img style="width: 100%;height: 40vh;" class="img-responsive" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}">
        <hr>
        <p>{!! $post->body !!}</p>
        <a class="btn btn-primary" href="{{route('home.post',$post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

    </div>
    @endforeach
    {{ $posts->links() }}
    @endif
@stop


@section('postSearch')
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
            {!! Form::open(['method'=>'GET','action'=>'AdminPostsController@searchResult']) !!}
                <div class="input-group">
                    <input type="text" class="form-control" name="s">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            {!! Form::close() !!}
        <!-- /.input-group -->
    </div>
@stop




@section('categories')
<div class="row">
    <div class="col-lg-6">
        @foreach($categories as $category)
        <ul class="list-unstyled">
            <li><a href="{{route('home.category',$category->id)}}">{{$category->name}}</a>
            </li>
        </ul>
        @endforeach
    </div>
</div>
@stop


