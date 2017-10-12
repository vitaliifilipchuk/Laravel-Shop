@extends('main')

@section('title')
    | User Profile
@endsection

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1>User Profile</h1>
            <hr>
            <h2>My Orders</h2>
            @foreach($orders as $order)
                <div class="card mb-3">
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($order->cart->items as $item)
                                <li class="list-group-item">
                                    <strong>{{ $item['item']['title'] }}</strong> | {{ $item['qty'] }} Units
                                    <span class="badge badge-info pull-right">${{ $item['price'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer">
                        <strong>Total Price: ${{ $order->cart->totalPrice }}</strong><span class="pull-right">{{ $order->created_at }}</span>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection