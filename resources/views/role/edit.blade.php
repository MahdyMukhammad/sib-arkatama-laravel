@extends('layout.main')

@section('maincontent')
    <div class="container-fluid px-4">
        <h1>Edit Role User</h1>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('role.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name"
                            required>
                    </div>
                    </br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('role.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
