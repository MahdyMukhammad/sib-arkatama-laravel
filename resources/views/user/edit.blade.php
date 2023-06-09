@extends('layout.main')
@section('maincontent')
    <div class="container-fluid px-4">
        <h1>Edit User</h1>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="form-label">Role User</label>
                        <select class="form-select" name="role" id="role">
                            <option selected disabled>Choose Your Role</option>
                            @foreach ($roles as $roleuser)
                                <option value="{{ $roleuser->id }}"{{ $user->role_id == $roleuser->id ? 'selected' : '' }}>
                                    {{ $roleuser->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Your Name"
                            name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Email</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Your Name"
                            name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Your Name"
                            name="phone" required>
                    </div>
                    </br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
