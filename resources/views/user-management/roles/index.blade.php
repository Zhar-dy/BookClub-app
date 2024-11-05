@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="row">
            <div class="col-sm-4">
            <a href="{{ route('roles.create') }}" class="btn btn-outline-dark">Create Role</a></div>
            <div class="col-sm-4">
            <a href="{{ route('permission.index') }}" class="btn btn-outline-info">View Permission</a></div>
            </div>
                <div class="card-header">{{ __('Role with spatie') }}</div>
                <div class="card-body">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                            <tr>
                                <th scope="row">{{$key + 1}}</th>
                                <td>{{$role->name}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('roles.show', $role->id) }}" class="dropdown-item">Show</a></li>
                                            <li><a href="{{ route('roles.edit', $role->id) }}" class="dropdown-item">Edit</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ url('/home') }}" class="btn btn-secondary">Back to home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
