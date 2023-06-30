<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:empleados',
            'puesto' => 'required',
            'fecha_nacimiento' => 'required|date_format:d/m/Y',
            'domicilio' => 'required',
            'skills' => 'required|array|min:1',
            'skills.*.nombre' => 'required',
            'skills.*.calificacion' => 'required|integer|min:1|max:5',
        ]);
    
        $empleado = Empleado::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'puesto' => $request->puesto,
            'fecha_nacimiento' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->fecha_nacimiento),
            'domicilio' => $request->domicilio,
        ]);
    
        foreach ($request->skills as $skillData) {
            $empleado->skills()->create([
                'nombre' => $skillData['nombre'],
                'calificacion' => $skillData['calificacion'],
            ]);
        }
    
        return redirect()->route('empleados.index')->with('success', 'Empleado registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
