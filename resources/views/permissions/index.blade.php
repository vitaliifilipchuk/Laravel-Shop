@extends('main')

@section('title')
    | Permissions
@endsection

@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h1><i class="fa fa-key"></i>Available Permissions

                <a href="{{ route('users.index') }}" class="btn btn-secondary pull-right ml-2">Users</a>
                <a href="{{ route('roles.index') }}" class="btn btn-secondary pull-right">Roles</a></h1>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">

                    <thead>
                    <tr>
                        <th>Permissions</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info pull-left mr-2">Edit</a>

                                <form method="POST" action="{{ route('permissions.destroy', $permission->id) }}">
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

            <a href="{{ route('permissions.create') }}" class="btn btn-success">Add Permission</a>

        </div>
        <div class="col-md-1"></div>
    </div>
@endsection