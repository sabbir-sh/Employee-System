@extends('Backend.layout.app')


@section('main-content')
<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Product List</h2>
        <a href="{{ route('admin.products.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Add New Product
        </a>
    </div>

    {{-- ✅ Success message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-center w-100">
            <thead class="table-dark">
                <tr>
                    <th>SL</th>
                    <th>Photos</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Discount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if (!empty($product->photos))
                                <div class="d-flex flex-wrap justify-content-center">
                                    @foreach (json_decode($product->photos, true) ?? [] as $photo)
                                        <img src="{{ asset('storage/' . $photo) }}" width="70" height="70" class="me-1 mb-1 border rounded" alt="photo">
                                    @endforeach
                                </div>
                            @else
                                <span class="text-muted">No Photos</span>
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>৳{{ number_format($product->price) }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->discount }}%</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


@endsection
