@extends('layouts.app')

@section('content')

<h2>Products</h2>

<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>QR</th>
        <th>Action</th>
    </tr>

    @foreach($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>{!! $product->qr !!}</td>
        <td>
            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">View</a>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>

            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection