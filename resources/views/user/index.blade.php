@extends('layout.main')

@section('maincontent')
    <div class="container-fluid px-4">
        <div class="card-header">
            <h1 class="mt-4">List User</h1>
        </div>
        <a class="btn btn-primary mb-3" href="{{ route('user.create') }}" role="button">Create New</a>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Role User</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $listuser)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $listuser->role->name }}</td>
                                <td>{{ $listuser->name }}</td>
                                <td>{{ $listuser->email }}</td>
                                <td>{{ $listuser->phone }}</td>
                                {{-- <td>
                                    <span
                                        class="badge  {{ $listuser->role->name == 'admin' ? 'bg-success' : 'bg-primary' }}">{{ $listuser->role->name }}</span>
                                </td> --}}

                                <td>
                                    <form onsubmit="return confirm('Are You Sure? ');"
                                        action="{{ route('user.destroy', $listuser->id) }}" method="POST">
                                        <a href="{{ route('user.edit', $listuser->id) }}" class="btn btn-warning">Edit</a>
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
