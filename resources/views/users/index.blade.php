@extends('main')

@section('title')
    | Users
@endsection

@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h1><i class="fa fa-users"></i> User Administration <a href="{{ route('roles.index') }}" class="btn btn-secondary pull-right ml-2">Roles</a>
                <a href="{{ route('permissions.index') }}" class="btn btn-secondary pull-right">Permissions</a></h1>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">

                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date/Time Added</th>
                        <th>User Roles</th>
                        <th>Operations</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($users as $user)
                        <tr>

                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                            <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left mr-2">Edit</a>

                                <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>

            <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>
        </div>
        <div class="col-md-1"></div>
    </div>
@endsection