<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesinal;
use App\Especialidad;

class ProfesionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $profesionales  = Profesinal::all();
        $especialidades = Especialidad::all();

        return view('profesional.index', compact('profesionales','especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
        $especialidades = Especialidad::all();

        return view('profesional.create', compact('especialidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'nombre'          => 'required',
          'apellido'        => 'required',
          'dni'             => 'required',
          'direccion'       => 'required',
          'email'           => 'required',
          'telefono'        => 'required',
          'cuit'            => 'required',
          'nro_matricula'   => 'required',
          'especialidad'    => 'required',
        ]);

        // dd($request->all());
        $nuevoProfesional                   = new Profesinal();
            $nuevoProfesional->nombre           = $request->nombre;
            $nuevoProfesional->apellido         = $request->apellido;
            $nuevoProfesional->dni              = $request->dni;
            $nuevoProfesional->direccion        = $request->direccion;
            $nuevoProfesional->telefono         = $request->telefono;
            $nuevoProfesional->cod_pos          = $request->codigo_postal;
            $nuevoProfesional->cuit             = $request->cuit;
            $nuevoProfesional->edad             = $request->edad;
            $nuevoProfesional->fecha_nacimiento = $request->fecha_nacimiento;
            $nuevoProfesional->especialidad_id  = $request->especialidad;
            $nuevoProfesional->nro_matricula    = $request->nro_matricula;
            $nuevoProfesional->email            = $request->email;
            $nuevoProfesional->tipo_usuario     = 3; // profesional
            $nuevoProfesional->estado           = $request->estado;
        $nuevoProfesional->save();

        // dd($request->all());

        return back()->with('mensaje', 'Profesional guardado con exito');

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
        //
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
        //
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
    }
}
