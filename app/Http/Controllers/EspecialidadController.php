<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especialidad;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $especialidades = Especialidad::all();

        return view('especialidad.index', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('especialidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required'
        ]);

        $nuevaEspecialidad                  = new Especialidad();
        $nuevaEspecialidad->nombre          = $request->nombre;
        $nuevaEspecialidad->descripcion     = $request->descripcion;
        $nuevaEspecialidad->estado          = $request->estado;
        $nuevaEspecialidad->save();

        return back()->with('mensaje', 'Especilidad agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        return view('especialidad.edit', compact('especialidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required'
        ]);

        $especialidadActualizada                = Especialidad::find($id);
        $especialidadActualizada->nombre        = $request->nombre;
        $especialidadActualizada->descripcion   = $request->descripcion;
        $especialidadActualizada->estado        = $request->estado;

        $especialidadActualizada->save();

        return back()->with('mensaje', 'Especialidad editada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $especialidadEliminada = Especialidad::find($id);
        $especialidadEliminada->delete();

        return back()->with('mensaje', 'Especialidad eliminada.');

    }
}
