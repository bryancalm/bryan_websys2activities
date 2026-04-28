@extends('layouts.app')

@section('content')

<h2>Product Details</h2>

<p><b>Name:</b> {{ $product->name }}</p>
<p><b>Price:</b> {{ $product->price }}</p>
<p><b>Description:</b> {{ $product->description }}</p>

<h4>QR Code:</h4>
{!! $qr !!}

<a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back</a>

@endsections