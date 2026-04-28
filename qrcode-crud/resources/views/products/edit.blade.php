@extends('layouts.app')

@section('content')

<h2>Edit Product</h2>

<form method="POST" action="{{ route('products.update', $product->id) }}">
@csrf
@method('PUT')

<div class="mb-2">
    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
</div>

<div class="mb-2">
    <input type="text" name="price" class="form-control" value="{{ $product->price }}">
</div>

<div class="mb-2">
    <textarea name="description" class="form-control">{{ $product->description }}</textarea>
</div>

<button class="btn btn-success">Update</button>
</form>

@endsection