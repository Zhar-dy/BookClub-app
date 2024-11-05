@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Roles') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('roles.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Permissions</label>
                            <div class="border p-3 rounded" style="max-height: 200px; overflow-y: auto;">
                                @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="{{ $permission->id }}" id="permission{{ $permission->id }}">
                                    <label class="form-check-label" for="permission{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    <div class="d-flex justify-content-between">
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Create Role</button>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
