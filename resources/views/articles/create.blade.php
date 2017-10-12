@extends('main')

@section('title')
    | Create New Article
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
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1>Create New Article</h1>
            <hr>
            <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input id="title" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="summary">Short Summary:</label>
                    <input id="summary" name="summary" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="article_picture">Upload Article Image</label>
                    <input type="file" name="article_picture" id="article_picture">
                </div>
                <div class="form-group">
                    <label for="description">Article Body:</label>
                    <textarea id="body" name="body" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Create" class="btn btn-success btn-lg btn-block">
                </div>
                @include('partials.errors')
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>﻿
@endsection