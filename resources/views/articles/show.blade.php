@extends('main')

@section('title')
    | Show Article
@endsection

@section('content')
    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
                <img class="blog-post-image" src="{{ asset('/images/articles/' . $article->article_picture) }}" alt="blog title image">
                <h2 class="blog-post-title">{{ $article->title }}</h2>
                <p class="blog-post-meta">{{ date('M j, Y H:i', strtotime($article->created_at)) }}</p>
                <p>{{ $article->summary }}</p>
                <p>{!! $article->body !!}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div>
                <dl>
                    <dt>URL:</dt>
                    <dd><a href="#">In progress</a></dd>
                    <dt>Created At:</dt>
                    <dd>{{ date('M j, Y H:i', strtotime($article->created_at)) }}</dd>
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y H:i', strtotime($article->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    <div class="col-sm-6">
                        <form method="POST" action="{{ route('articles.destroy', $article->id) }}">
                            <input type="submit" value="Delete" class="btn btn-danger btn-block">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>﻿
                    </div>
                </div>﻿
                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{ route('articles.index') }}" class="btn btn-outline-primary btn-block">Show all Articles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
