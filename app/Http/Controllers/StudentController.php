<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
       $students = Student::all();
       return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|min:5|max:100',
        'age' => 'required|integer|min:1',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // validación para imágenes
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('students', 'public'); // almacenar en storage/app/public/students
        $request->merge(['image' => $imagePath]);
    }

    Student::create($request->all());

    return redirect()->route('students.index');
}

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit',compact('student'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:100',
            'age' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $student = Student::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($student->image) {
                Storage::disk('public')->delete($student->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        if ($student->image) {
            Storage::disk('public')->delete($student->image);
        }
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
