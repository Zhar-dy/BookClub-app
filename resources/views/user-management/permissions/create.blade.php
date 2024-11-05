@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Permission</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('permission.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="col-form-label">Permission Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Permission Name">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Want auto create with basic permission list?</label>
                            <div>
                            <input class="form-check-input" name="checked" type="checkbox" id="flexCheckDefault"><--check here
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-primary">Create</button>
                            <button type="reset" class="btn btn-outline-danger">Clear</button>
                            <a href="{{ route('permission.index') }}" class="btn btn-dark btn-active-dark-primary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
