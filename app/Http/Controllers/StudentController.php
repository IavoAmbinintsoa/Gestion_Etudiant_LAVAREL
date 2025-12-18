<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $students = Student::when($search, function($query) use ($search) {
            return $query->where('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
        })->orderBy('created_at', 'desc')->get();

        return view('students.index', compact('students', 'search'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email|unique:students|max:100',
            'phone' => 'nullable|max:20',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|max:500',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('message', __('messages.student_added'))
            ->with('message_type', 'success');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email|max:100|unique:students,email,' . $student->id,
            'phone' => 'nullable|max:20',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|max:500',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')
            ->with('message', __('messages.student_updated'))
            ->with('message_type', 'success');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('message', __('messages.student_deleted'))
            ->with('message_type', 'success');
    }
}