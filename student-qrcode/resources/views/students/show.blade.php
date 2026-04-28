@extends('layouts.app')

@section('content')

<h2>Student Details</h2>

<p><b>Student No:</b> {{ $student->student_no }}</p>

<p><b>Name:</b> {{ $student->name }}</p>

<p><b>Course:</b> {{ $student->course }}</p>

<p><b>Year Level:</b> {{ $student->year_level }}</p>

<h4>QR Code</h4>

{!! $qr !!}

<a href="{{ route('students.index') }}"
class="btn btn-secondary mt-3">

Back

</a>

@endsection