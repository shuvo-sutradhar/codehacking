@extends('layouts.blog-home')
    @section('slider')
    <div class="carousel">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="http://codeshaper.net/assets/img/banner-2/bg.jpg" alt="Los Angeles">
              <div class="carousel-caption">
                <h3>Welcome to Laravel</h3>
                <p>LA is always so much fun!</p>
              </div>
            </div>

            <div class="item">
              <img src="http://codeshaper.net/assets/img/banner-1/bg.jpg" alt="Chicago">
              <div class="carousel-caption">
                <h3>I love Laravel</h3>
                <p>LA is always so much fun!</p>
              </div>
            </div>

          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
    @stop



    @section('blogPost')
        <h1 class="page-header">
            Blog Posts
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
            <p>{!! str_limit($post->body,150) !!}</p>
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



    @section('catagories')
        <div class="row">
            <div class="col-lg-6">
                @foreach($catagories as $category)
                <ul class="list-unstyled">
                    <li><a href="{{route('home.category',$category->slug)}}">{{$category->name}}</a>
                    </li>
                </ul>
                @endforeach
            </div>
        </div>

    @stop
