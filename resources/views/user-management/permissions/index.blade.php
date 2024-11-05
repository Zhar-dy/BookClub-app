@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="row">
            <div class="col-sm-4">
            <a href="{{ route('permission.create') }}" class="btn btn-outline-dark">Create Permission</a></div>
            <div class="col-sm-4">
            <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary">View Roles</a></div>
            </div>
                <div class="card-header">{{ __('Permission with spatie') }}</div>
                <div class="card-body">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $key => $permission)
                            <tr>
                                <th scope="row">{{$key + 1}}</th>
                                <td>{{$permission->name}}</td>
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
