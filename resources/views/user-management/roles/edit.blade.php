@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Roles') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('roles.update' , $role->id) }}">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input type="name" class="form-control" name="name" value="{{ $role->name }}" required autocomplete="name" autofocus>
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
                                    <td scope="col">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="checkbox-item" {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                    </td>
                                    <label class="form-check-label" for="permission{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Role</button>
                    </form>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
