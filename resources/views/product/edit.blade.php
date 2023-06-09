@extends('layout.main')
@section('maincontent')
    <div class="container-fluid px-4">
        <h1>Edit List Product</h1>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('product.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="categories" class="form-label">Categories</label>
                        <select class="form-select" name="categories" id="categories">
                            <option selected disabled>Choose Categories</option>
                            @foreach ($categories as $cate)
                                <option value="{{ $cate->id }}"
                                    {{ $product->categories_id == $cate->id ? 'selected' : '' }}>{{ $cate->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Your Name"
                            name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" placeholder="Enter Your price"
                            name="price" required>
                    </div>
                    </br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('product.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
