<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;  // Already needed for Request

Route::match(['get', 'post'], '/evaluation', function (Request $request) {
    // Check if form is submitted
    if ($request->isMethod('post')) {
        $data = $request->only(['name', 'prelim', 'midterm', 'final']);
        return view('evaluation', ['data' => $data]);
    }
    return view('evaluation');
});