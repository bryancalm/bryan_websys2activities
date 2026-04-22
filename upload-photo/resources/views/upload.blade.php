<!DOCTYPE html>

<html>

<head>

<title>Laravel Image Upload (Single + Multiple)</title>

</head>

<body>

<h1>Single Image Upload</h1>

<form action="{{ route('photos.store.single') }}" method="POST" enctype="multipart/form-data">

@csrf

<input type="file" name="image" required>

<button type="submit">Upload</button>

</form>

<h1>Multiple Images Upload</h1>

<form action="{{ route('photos.store.multiple') }}" method="POST" enctype="multipart/form-data">

@csrf

<input type="file" name="images[]" multiple required>

<button type="submit">Upload</button>

</form>

@if(session('success'))

<p style="color: green;">{{ session('success') }}</p>

@endif

</body>

</html>