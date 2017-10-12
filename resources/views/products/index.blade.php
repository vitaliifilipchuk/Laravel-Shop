@extends('main')

@section('title')
    | Products
@endsection

@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-7">
            <h1>All Products</h1>
        </div>
        <div class="col-md-3">
            <a href="{{ route('products.create') }}" class="btn btn-lg btn-block btn-primary">Create new product</a>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-striped table-bordered">
                <thead class="table-inverse">
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Created at</th>
                <th>Price</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th>{{ $product->id }}</th>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->author }}</td>
                        <td>{{ $product->created_at->format(' H:i, F d, Y') }}</td>
                        <td>{{ $product->price }}$</td>
                        <td><a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('products.destroy', $product->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pages-center">
                {!! $products->links() !!}
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
@endsection