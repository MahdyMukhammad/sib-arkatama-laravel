@extends('layout.main')

@section('maincontent')
    <div class="container-fluid px-4">
        <div class="card-header">
            <h1 class="mt-4">Role User</h1>
        </div>
        <a class="btn btn-primary mb-3" href="{{ route('role.create') }}" role="button">Create New</a>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $roleuser)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $roleuser['name'] }}</td>
                                <td>
                                    <form onsubmit="return confirm('Are You Sure? ');"
                                        action="{{ route('role.destroy', $roleuser->id) }}" method="POST">
                                        <a href="{{ route('role.edit', $roleuser->id) }}" class="btn btn-warning">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
