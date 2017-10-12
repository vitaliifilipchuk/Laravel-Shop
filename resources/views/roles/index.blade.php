@extends('main')

@section('title')
    | Roles
@endsection

@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h1><i class="fa fa-key"></i> Roles

                <a href="{{ route('users.index') }}" class="btn btn-secondary pull-right ml-2">Users</a>
                <a href="{{ route('permissions.index') }}" class="btn btn-secondary pull-right">Permissions</a></h1>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Role</th>
                        <th>Permissions</th>
                        <th>Operation</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($roles as $role)
                        <tr>

                            <td>{{ $role->name }}</td>

                            <td>{{ str_replace(',',', ',str_replace(array('[',']','"'),'', $role->permissions()->pluck('name'))) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                            <td>
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info pull-left mr-3">Edit</a>

                                <form method="POST" action="{{ route('roles.destroy', $role->id) }}">
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

            <a href="{{ route('roles.create') }}" class="btn btn-success">Add Role</a>

        </div>
        <div class="col-md-1"></div>
    </div>
@endsection