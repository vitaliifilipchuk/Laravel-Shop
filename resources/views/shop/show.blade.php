@extends('main')

@section('title')
    | {{ $product->title }}
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-1 col-md-1"></div>
        <div class="col-sm-4 col-md-3"><img src="{{ asset('images/' . $product->image) }}" class="fit-div-image item-image" alt="..."></div>
        <div class="col-sm-6 col-md-7">
            <h3 class="mt-2">{{ $product->title }}</h3>
            <h4 class="mt-3">{{ $product->author }}</h4>
            <h5>{{ $product->price }}$</h5>
            <p class="mt-4 text-justify">{{ $product->description }}</p>
            <p><a class="btn btn-lg btn-primary pull-right" href="{{ route('product.addToCart', $product->id) }}" role="button">Add to Cart</a></p>
        </div>
        <div class="col-sm-1 col-md-1"></div>

    </div>
@endsection