@extends('main')

@section('title')
    | Create New Product
@endsection

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1>Create New Product</h1>
            <hr>
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input id="title" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="author">Author:</label>
                    <input id="author" name="author" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="cover_image">Upload Cover Image</label>
                    <input type="file" name="cover_image" id="cover_image">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input id="price" name="price" class="form-control" required>
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