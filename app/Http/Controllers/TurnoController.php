<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sucursal;
use App\SucursalesDias;
use App\Profesinal;
use App\Especialidad;
use App\Sala;
use App\ObraSocial;
use App\Plan;

use App\Cobertura;
use App\Paciente;
use App\Turno;

class TurnoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequest()
    {
        return view('turnos.index');
    }
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequestPost(Request $request)
    {

        $input = $request->all();
        // dd($input);
        \Log::info($input);
   
        return response()->json( ['success'=> 'Got Simple Ajax Request.'] );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('turnos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pacientes      = Paciente::all();
        $especialidades = Especialidad::all();

        $turnos         = Turno::select('dia AS daysOfWeek', 'fecha as start', 'hora_inicio AS startTime', 'hora_fin AS endTime')
                                    ->where('sucursal_id', 1)
                                    ->where('especialidad_id', 1)
                                    ->where('estado', 1)
                                    ->get();
        
        $diasEspecialidades = Sala::select('dia AS daysOfWeek', 'hora_desde AS startTime', 'hora_hasta AS endTime')
                                    ->where('sucursal_id', 1)
                                    ->where('especialidad_id', 1)
                                    ->where('estado', 1)
                                    ->get();
                                
        // dd($turnos);
        // response()->json( ['success'=> 'Got Simple Ajax Request.'] )
        $fechaHoy = date("Y-m-d");
        return view('turnos.create', compact('pacientes', 'especialidades', 'diasEspecialidades', 'turnos', 'fechaHoy'));
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
