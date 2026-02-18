<?php

use Illuminate\Support\Facades\Route;

//Student Profile Page

Route::get('/student/{id}/{name}', function ($id, $name) {
    return view('student', [
        'id' => $id,
        'name' => $name
    ]);
});


//Course Enrollment Page

Route::get('/course/{course}/{year?}', function ($course, $year = "Not Provided") {
    return view('course', [
        'course' => $course,
        'year' => $year
    ]);
});


//OJT Company Information Page

Route::get('/ojt/{company}/{city}/{allowance?}', function ($company, $city, $allowance = "No") {
    return view('ojt', [
        'company' => $company,
        'city' => $city,
        'allowance' => $allowance
    ]);
});


//Event Registration Page

Route::get('/event/{event}/{participant}/{year}', function ($event, $participant, $year) {
    return view('event', [
        'event' => $event,
        'participant' => $participant,
        'year' => $year
    ]);
});