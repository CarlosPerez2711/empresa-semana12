<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreatePersonaRequest;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = Persona::orderBy('nPerCodigo', 'asc')->paginate(3);
        return view('personas', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create', [
            'persona' => new Persona
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePersonaRequest $request)
    {
        $persona = new Persona($request->validated());

        if ($request->hasFile('image')) {
            $persona->image = $request->file('image')->store('images');
        }

        $persona->save();
        return redirect()->route('personas.index')->with('estado', 'La persona fue creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nPerCodigo)
    {
        return view('show', [
            'persona' => Persona::find($nPerCodigo)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona)
    {
        return view('editar', [
            'persona' => $persona
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Persona $persona, CreatePersonaRequest $request)
    {
        if ($request->hasFile('image')) {
            // Elimina la imagen antigua si existe
            if ($persona->image) {
                Storage::delete($persona->image);
            }

            // Actualiza la información de la persona
            $persona->fill($request->validated());
            $persona->image = $request->file('image')->store('images');
        } else {
            // Actualiza sin cambiar la imagen
            $persona->update(array_filter($request->validated()));
        }

        $persona->save();
        return redirect()->route('personas.show', $persona)->with('estado', 'La persona fue actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        // Elimina la imagen asociada si existe
        if ($persona->image) {
            Storage::delete($persona->image);
        }

        $persona->delete();

        return redirect()->route('personas.index')->with('estado', 'La persona fue eliminada correctamente');
    }
    
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
}

