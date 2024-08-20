{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Products</h2>

    <!-- Search Form -->
    <form action="{{ route('products.search') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search products..." name="search">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>

    <!-- Products List -->
    @if($products->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $products->links() }}
    @else
        <p>No products found.</p>
    @endif

    <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
</div>
@endsection
 --}}


 @extends('layouts.app')

 @section('content')
     <div class="container">
         <h1>Products</h1>

         <div class="mb-3">
             <form action="{{ route('products.index') }}" method="GET" class="d-flex">
                 <input type="text" name="search" class="form-control me-2" placeholder="Search products">
                 <button type="submit" class="btn btn-primary">Search</button>
             </form>
         </div>

         <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>

         <table class="table">
             <thead>
                 <tr>
                    <th>Slno</th>
                     <th>Name</th>
                     <th>Description</th>
                     <th>Price</th>
                     <th>Actions</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($products as $product)
                     <tr>
                        <td> {{ $products->firstItem() + $loop->index }} </td>
                         <td>{{ $product->name }}</td>
                         <td>{{ $product->description }}</td>
                         <td>{{ $product->price }}</td>
                         <td>
                             <a href="{{ route('products.edit', $product) }}" class="btn btn-primary btn-sm">Edit</a>
                             <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline-block;">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                             </form>
                         </td>
                     </tr>
                 @endforeach
             </tbody>
         </table>

         {{ $products->links() }}
     </div>
 @endsection