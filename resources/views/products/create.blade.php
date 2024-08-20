{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Product</h2>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" class="form-control" name="name" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" class="form-control" name="description"></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" id="price" class="form-control" name="price" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
@endsection
 --}}

 @extends('layouts.app')

 @section('content')
     <div class="container">
         <h1>Create Product</h1>

         <form action="{{ route('products.store') }}" method="POST">
             @csrf

             <div class="mb-3">
                 <label for="name" class="form-label">Name</label>
                 <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                 @error('name')
                     <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
             </div>

             <div class="mb-3">
                 <label for="description" class="form-label">Description</label>
                 <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                 @error('description')
                     <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
             </div>

             <div class="mb-3">
                 <label for="price" class="form-label">Price</label>
                 <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                 @error('price')
                     <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
             </div>

             <button type="submit" class="btn btn-primary">Create</button>
         </form>
     </div>
 @endsection