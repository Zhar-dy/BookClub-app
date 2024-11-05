@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="d-grid gap-2 d-md-block">
                    <a href=" {{ route('roles.index') }} " class="btn btn-outline-primary">Role Index</a>
                    <a href=" {{ route('permission.index') }} " class="btn btn-outline-secondary">Permission Index</a>
                    </div>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
