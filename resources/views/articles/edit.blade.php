@extends('main')

@section('title')
    | Edit Article
@endsection

@section('styles')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input id="title" name="title" class="form-control" value="{{ $article->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="summary">Short Summary:</label>
                            <input id="summary" name="summary" class="form-control" value="{{ $article->summary }}" required>
                        </div>
                        <div class="form-group">
                            <label for="article_picture">Update Article Image</label>
                            <input type="file" name="article_picture" id="article_picture">
                        </div>
                        <div class="form-group">
                            <label for="description">Article Body:</label>
                            <textarea id="body" name="body" rows="10" class="form-control">{{ $article->body }}</textarea>
                        </div>
                        @include('partials.errors')
                    </div>
                    <div class="col-md-4">
                        <dl class="dl-horizontal">
                            <dt>Created At:</dt>
                            <dd>{{ date('M j, Y H:i', strtotime($article->created_at)) }}</dd>
                            <dt>Last Updated:</dt>
                            <dd>{{ date('M j, Y H:i', strtotime($article->updated_at)) }}</dd>
                        </dl>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-danger btn-block">Back</a>
                            </div>
                            <div class="col-sm-6">
                                {{ method_field('PUT') }}
                                <button type="submit" class="btn btn-success btn-block">Save</button>
                                {{ csrf_field() }}
                            </div>﻿
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>﻿
@endsection