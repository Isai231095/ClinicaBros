<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Student;
use App\Models\Servicio;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::with(['student', 'servicio'])->get();
        return view('agenda.index', compact('agenda'));
    }

    public function create()
    {
        $students = Student::all();
        $servicios = Servicio::all();
        return view('agenda.create', compact('students', 'servicios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'student_id' => 'required|exists:students,id',
            'servicio_id' => 'required|exists:servicios,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        Agenda::create($request->all());

        return redirect()->route('agenda.index');
    }

    public function show(string $id)
    {
        $agenda = Agenda::with(['student', 'servicio'])->findOrFail($id);
        return view('agenda.show', compact('agenda'));
    }

    public function edit(string $id)
    {
        $agenda = Agenda::findOrFail($id);
        $students = Student::all();
        $servicios = Servicio::all();
        return view('agenda.edit', compact('agenda', 'students', 'servicios'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'student_id' => 'required|exists:students,id',
            'servicio_id' => 'required|exists:servicios,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $agenda = Agenda::findOrFail($id);
        $agenda->update($request->all());

        return redirect()->route('agenda.index');
    }

    public function destroy(string $id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();
        return redirect()->route('agenda.index');
    }
}
