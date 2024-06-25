<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{

    public function index()
    {
        $servicios = Servicio::all();
        return view('servicios.index', compact('servicios'));
    }

    public function create()
    {
        return view('servicios.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:100',
            'type' => 'required|string|min:5|max:100',
            'cost' => 'required|numeric|min:0.01|max:100000', // Ajustar validación

        ]);

        Servicio::create($request->all());

        return redirect()->route('servicios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $servicios = Servicio::findOrFail($id);
        return view('servicios.edit',compact('servicios'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:100',
            'type' => 'required|string|min:5|max:100',
            'cost' => 'required|numeric|min:0.01|max:100000',
        ]);

        $servicios = Servicio::findOrFail($id);

        $servicios->update($request->all());

        return redirect()->route('servicios.index');
    }

    public function destroy(string $id)
    {
        $servicios= Servicio::findOrFail($id);
        $servicios-> delete();
        return redirect()->route('servicios.index');
    }
}
