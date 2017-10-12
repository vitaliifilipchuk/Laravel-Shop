@extends('main')

@section('title')
    | Checkout
@endsection

@section('content')
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h1>Checkout</h1>
                <h4>Your Total: {{ $totalPrice }}$</h4>
                <div id="charge-error" class="alert alert-danger {{ !session()->has('error') ? 'd-none' : ''  }}">
                    {{ session()->get('error') }}
                </div>
                <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="form-control" readonly required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" name="address" class="form-control" required>
                            </div>
                        </div>
                        <hr>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-name">Card Holder Name</label>
                                <input type="text" id="card-name" class="form-control" value="{{ Auth::user()->name }}" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-number">Credit Card Number</label>
                                <input type="text" id="card-number" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="card-expiry-month">Expiration Month</label>
                                        <input type="text" id="card-expiry-month" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="card-expiry-year">Expiration Year</label>
                                        <input type="text" id="card-expiry-year" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-cvc">CVC</label>
                                <input type="text" id="card-cvc" class="form-control" required>
                            </div>
                        </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-success">Buy now</button>
                </form>
            </div>

            <div class="col-sm-3"></div>
        </div>
@endsection

@section('scripts')
    <script src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ asset('js/checkout.js') }}"></script>
@endsection