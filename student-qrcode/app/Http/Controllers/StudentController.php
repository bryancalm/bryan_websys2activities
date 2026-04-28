<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StudentController extends Controller
{

    // DISPLAY + SEARCH
    public function index(Request $request)
    {
        $search = $request->search;

        $students = Student::when($search, function ($query) use ($search) {
            return $query->where('student_no', 'like', "%$search%")
                         ->orWhere('name', 'like', "%$search%");
        })->get()->map(function ($student) {

            $student->qr = QrCode::size(100)->generate(
                route('students.show', $student->id)
            );

            return $student;
        });

        return view('students.index', compact('students','search'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_no' => 'required',
            'name' => 'required',
            'course' => 'required',
            'year_level' => 'required'
        ]);

        Student::create($request->all());

        return redirect()
            ->route('students.index')
            ->with('success','Student Created Successfully');
    }

    public function show(Student $student)
    {

        $qr = QrCode::size(200)->generate(
            json_encode([
                'Student No' => $student->student_no,
                'Name' => $student->name,
                'Course' => $student->course,
                'Year Level' => $student->year_level
            ])
        );

        return view('students.show', compact('student','qr'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {

        $request->validate([
            'student_no' => 'required',
            'name' => 'required',
            'course' => 'required',
            'year_level' => 'required'
        ]);

        $student->update($request->all());

        return redirect()
            ->route('students.index')
            ->with('success','Student Updated Successfully');
    }

    public function destroy(Student $student)
    {

        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success','Student Deleted Successfully');
    }

}