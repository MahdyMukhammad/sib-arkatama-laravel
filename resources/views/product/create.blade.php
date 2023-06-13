@extends('layout.main')
@section('maincontent')
    <div class="container-fluid px-4">
        <h1>Create List Product</h1>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="categories" class="form-label">Categories</label>
                        <select class="form-select @error('category') is-invalid @enderror" name="category" id="categories"
                            aria-label="category">
                            <option selected disabled>Choose Categories</option>
                            @foreach ($categories as $cate)
                                <option value="{{ $cate->id }}"{{ old('category') == $cate->id ? 'selected' : '' }}>
                                    {{ $cate->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="Enter Your Name" value="{{ old('name') }}" name="name" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                            placeholder="Enter Your price" value="{{ old('price') }}" name="price" required>
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Product Image</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                            id="image" accept=".jpg, .jpeg, .png., .webp">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    </br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('product.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
