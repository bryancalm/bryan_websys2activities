@extends('layouts.app')

@section('content')

<h2>Student List</h2>

<a href="{{ route('students.create') }}" class="btn btn-primary mb-3">
Add Student
</a>

@if(session('success'))

<div class="alert alert-success">
{{ session('success') }}
</div>

@endif

<!-- SEARCH -->

<form method="GET" action="{{ route('students.index') }}" class="mb-3">

<input
type="text"
name="search"
value="{{ $search }}"
placeholder="Search Student..."
class="form-control">

</form>

<table class="table table-bordered">

<tr>

<th>ID</th>
<th>Student No</th>
<th>Name</th>
<th>Course</th>
<th>Year</th>
<th>QR Code</th>
<th>Actions</th>

</tr>

@foreach($students as $student)

<tr>

<td>{{ $student->id }}</td>

<td>{{ $student->student_no }}</td>

<td>{{ $student->name }}</td>

<td>{{ $student->course }}</td>

<td>{{ $student->year_level }}</td>

<td>

{!! $student->qr !!}

</td>

<td>

<a href="{{ route('students.show',$student->id) }}"
class="btn btn-info btn-sm">

View

</a>

<a href="{{ route('students.edit',$student->id) }}"
class="btn btn-warning btn-sm">

Edit

</a>

<form action="{{ route('students.destroy',$student->id) }}"
method="POST"
style="display:inline;">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">

Delete

</button>

</form>

</td>

</tr>

@endforeach

</table>

@endsection