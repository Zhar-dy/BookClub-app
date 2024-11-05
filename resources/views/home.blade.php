@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-grid gap-2 d-md-block">
        <a href=" {{ route('roles.index') }} " class="btn btn-outline-primary">Role Index</a>
        <a href=" {{ route('permission.index') }} " class="btn btn-outline-secondary">Permission Index</a>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createGenre">Create Genre</button>
        @include('genre.create')
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($genres as $key => $genre)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{ $genre->name }}</td>
                                <td>action</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
