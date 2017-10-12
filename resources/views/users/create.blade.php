@extends('main')

@section('title')
    | Create User
@endsection

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1><i class='fa fa-user-plus'></i> Add User</h1>
            <hr>
            <form action="{{ route('users.store') }}" method="POST">
                <div class="form-group">
                    <label for="name" class="form-control-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email" class="form-control-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <h5><b>Give Role</b></h5>
                <div class="form-group">
                    @foreach($roles as $role)
                        <input type="checkbox" name="roles[]" value="{{ $role->id }}"> <span>&nbsp;{{ ucfirst($role->name) }}</span>
                        <br>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="password" class="form-control-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="form-control-label">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
                {{ csrf_field() }}
                <input type="submit" value="Create User" class="btn btn-primary">
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection