@extends('main')

@section('title')
    | Shopping Cart
@endsection

@section('content')
    @if(session()->has('cart'))
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <strong>{{ $product['item']['title'] }}</strong>
                            <span class="badge badge-success badge-pill">{{ $product['price'] }}$</span>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}">Reduce by 1</a></li>
                                    <li><a href="{{ route('product.remove', ['id' => $product['item']['id']]) }}">Reduce All</a></li>
                                </ul>
                            </div>
                            <span class="badge badge-secondary pull-right">{{ $product['qty'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="mt-3"><strong>Total: {{ $totalPrice }}$</strong></div>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <a href="{{ route('checkout') }}" class="btn btn-success">Checkout</a>
            </div>
            <div class="col-sm-3"></div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h2>No items in cart!</h2>
            </div>
            <div class="col-sm-3"></div>
        </div>
    @endif
@endsection