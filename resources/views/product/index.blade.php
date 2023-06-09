@extends('layout.main')

@section('maincontent')
    <div class="container-fluid px-4">
        <div class="card-header">
            <h1 class="mt-4">List Products</h1>
        </div>

        <a class="btn btn-primary mb-3" href="{{ route('product.create') }}" role="button">Create New</a>

        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $products)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $products->category->name }}</td>
                                <td>{{ $products['name'] }}</td>
                                <td>Rp. {{ number_format($products->price, 0, 2) }}</td>
                                <td>
                                    <form onsubmit="return confirm('Are You Sure? ');"
                                        action="{{ route('product.destroy', $products->id) }}" method="POST">
                                        <a href="{{ route('product.edit', $products->id) }}"
                                            class="btn btn-warning">Edit</a>
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
