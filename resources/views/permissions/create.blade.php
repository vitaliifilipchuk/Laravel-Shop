@extends('main')

@section('title')
    | Create Permission
@endsection

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1><i class='fa fa-key'></i> Add Permission</h1>
            <hr>
            <form action="{{ route('permissions.store') }}" method="POST">
                <div class="form-group">
                    <label for="name" class="form-control-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control"  required>
                </div>
                @if(!$roles->isEmpty())
                    <div class="form-group">
                        <h4>Assign Permission to Roles</h4>
                        @foreach($roles as $role)
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}"> <span>&nbsp;{{ ucfirst($role->name) }}</span>
                            <br>
                        @endforeach
                    </div>
                @endif
                {{ csrf_field() }}
                <input type="submit" value="Create Permission" class="btn btn-primary">
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection