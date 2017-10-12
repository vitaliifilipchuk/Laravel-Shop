@extends('main')

@section('title')
    @if ($category != '')
    | {{$category->name }}
    @else
    | All Categories
    @endif
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-4 col-md-3">
            @include('partials.sidebar')
        </div>
        <div class="col-sm-8 col-md-9">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="thumbnail clearfix">
                            <a href="{{ route('shop.show', $product->id) }}"><img src="{{ asset('images/' . $product->image) }}" class="img-responsive" alt="..."></a>
                            <div class="caption">
                                <h4 class="product-title">{{ $product->title }}</h4>
                                <h5 class="product-author">{{ $product->author }}</h5>
                                <p class="product-description">{{ str_limit($product->description, 160) }}</p>
                                <p><span class="pull-left price">{{ $product->price }}$</span><a href="{{ route('product.addToCart', $product->id) }}" class="btn btn-success pull-right" role="button">Add to Cart</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pages-center">
                {!! $products->links() !!}
            </div>
        </div>
    </div>
@endsection