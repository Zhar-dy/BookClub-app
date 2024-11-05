@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Show Role Info
                </div>
                <div class="card-body">
                    <h5 class="card-title">Role of {{$role->name}}</h5>
                    <p class="card-text">Permissions List:-</p>
                    <div class="card">
                        <ul class="list-group list-group-numbered">
                            @foreach ($permissions as $permission)
                            <li class="list-group-item">{{$permission->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="card-footer">
                        <a href="{{ route('roles.index') }}" class="btn btn-outline-dark">Back</a>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
