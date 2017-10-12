@extends('main')

@section('title')
    | Show Product
@endsection

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-6">
        <img class="rounded mx-auto d-block product-cover" src="{{ asset('/images/' . $product->image) }}" alt="cover_page">
        <h3 class="mt-2">{{ $product->title }}</h3>
        <h4 class="mt-3">{{ $product->author }}</h4>
        <h5>{{ $product->price }}$</h5>
        <p class="mt-4">{{ $product->description }}</p>
    </div>
    <div class="col-md-4">
        <div>
            <dl>
                    <dt>URL:</dt>
                    <dd><a href="#">In progress</a></dd>
                    <dt>Category:</dt>
                    <dd>{{ $product->category->name }}</dd>
                    <dt>Created At:</dt>
                    <dd>{{ date('M j, Y H:i', strtotime($product->created_at)) }}</dd>
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y H:i', strtotime($product->updated_at)) }}</dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-block">Edit</a>
                </div>
                <div class="col-sm-6">
                    <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                        <input type="submit" value="Delete" class="btn btn-danger btn-block">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>﻿
                </div>
            </div>﻿
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-primary btn-block">Show all Products</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
@endsection