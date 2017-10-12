@extends('main')

@section('title')
    | Edit Product
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input id="title" name="title" class="form-control" value="{{ $product->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="author">Author:</label>
                            <input id="author" name="author" class="form-control" value="{{ $product->author }}" required>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category:</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                            @if($category->id == $product->category_id)
                                            selected = "selected"
                                            @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cover_image">Update Cover Image</label>
                            <input type="file" name="cover_image" id="cover_image">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" rows="5" class="form-control">{{ $product->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input id="price" name="price" class="form-control" value="{{ $product->price }}" required>
                        </div>
                        @include('partials.errors')
                    </div>
                    <div class="col-md-4">
                        <dl class="dl-horizontal">
                            <dt>Created At:</dt>
                            <dd>{{ date('M j, Y H:i', strtotime($product->created_at)) }}</dd>
                            <dt>Last Updated:</dt>
                            <dd>{{ date('M j, Y H:i', strtotime($product->updated_at)) }}</dd>
                        </dl>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-danger btn-block">Back</a>
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