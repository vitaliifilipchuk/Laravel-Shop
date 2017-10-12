@extends('main')

@section('title')
    | Categories
@endsection

@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h1>All Categories</h1>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-7">
            <table class="table table-striped table-bordered">
                <thead class="table-inverse">
                <th>#</th>
                <th>Name</th>
                <th>Num. of Products</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->products->count() }}</td>
                        <td><a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-primary btn-sm">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div>
                <form action="{{ route('categories.store') }}" method="POST">
                    {{ csrf_field() }}
                    <h2>New Category</h2>
                    <div class="form-group">
                        <label name="name">Name:</label>
                        <input id="name" name="name" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Create Category" class="btn btn-primary btn-block">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
@endsection