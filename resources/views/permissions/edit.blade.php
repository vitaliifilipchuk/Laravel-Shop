@extends('main')

@section('title')
    | Edit Permission
@endsection

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1><i class='fa fa-key'></i> Edit {{ $permission->name }}</h1>
            <hr>
            <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                <div class="form-group">
                    <label for="name" class="form-control-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $permission->name }}" required>
                </div>
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <input type="submit" value="Update Permission" class="btn btn-primary">
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection