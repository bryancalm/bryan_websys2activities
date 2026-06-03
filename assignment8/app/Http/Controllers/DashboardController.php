<?php

namespace App\Http\Controllers;

use App\Models\StudentScore;

class DashboardController extends Controller
{
    public function index()
    {
        $scores = StudentScore::all();

        $labels = $scores->pluck('subject');
        $data = $scores->pluck('score');

        return view('dashboard', compact('labels', 'data'));
    }
}