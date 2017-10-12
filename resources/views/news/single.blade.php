@extends('main')

@section('title')
    | {{ $article->title }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 blog-main">

                <div class="blog-post mb-3">

                    <h2 class="blog-post-title">{{ $article->title }}</h2>
                    <p class="blog-post-meta">{{ date('M j, Y H:i', strtotime($article->created_at)) }}</p>

                    <img class="fit-div-image mb-4" src="{{ asset('/images/articles/' . $article->article_picture) }}" alt="blog title image">

                    <p class="text-justify">{!! $article->body !!}</p>
                </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->
        <div class="col-md-2"></div>

    </div><!-- /.row -->
@endsection