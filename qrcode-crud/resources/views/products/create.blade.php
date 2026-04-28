@extends('layouts.app')

@section('content')

<h2>Add Product</h2>

<form method="POST" action="{{ route('products.store') }}">
@csrf

<div class="mb-2">
    <input type="text" name="name" class="form-control" placeholder="Name">
</div>

<div class="mb-2">
    <input type="text" name="price" class="form-control" placeholder="Price">
</div>

<div class="mb-2">
    <textarea name="description" class="form-control" placeholder="Description"></textarea>
</div>

<button class="btn btn-success">Save</button>
</form>

@endsection     