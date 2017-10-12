@extends('main')

@section('title')
    | Create Role
@endsection

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1><i class='fa fa-key'></i> Add Role</h1>
            <hr>
            <form action="{{ route('roles.store') }}" method="POST">
                <div class="form-group">
                    <label for="name" class="form-control-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control"  required>
                </div>
                <h5><b>Assign Permissions</b></h5>
                <div class="form-group">
                    @foreach($permissions as $permission)
                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"> <span>&nbsp;{{ ucfirst($permission->name) }}</span>
                        <br>
                    @endforeach
                </div>
                {{ csrf_field() }}
                <input type="submit" value="Create Role" class="btn btn-primary">
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection