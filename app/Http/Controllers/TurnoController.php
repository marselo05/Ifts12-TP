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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fechaHoy   = date("Y-m-d");
        $turnos     = Turno::all()
                        ->where('estado', 1)
                        ->where('tipo_de_orden_id', 0)
                        ->where('sucursal_id', 1)
                        ->where('fecha', $fechaHoy);

        $confirmados   = Turno::all()
                        ->where('estado', 1)
                        ->where('tipo_de_orden_id', 1)
                        ->where('sucursal_id', 1)
                        ->where('fecha', $fechaHoy);


                        // dd($fechaHoy);
        return view('turnos.index', compact('turnos', 'confirmados'));
    }


    public function confirmarTurno ($id)
    {
        // dd($id);
        $turnoConfirma                      = Turno::find($id);
        $turnoConfirma->tipo_de_orden_id    = 1;
        $turnoConfirma->save();

        return back()->with('mensaje', 'El paciente ha sido confirmado');
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
                                
        $fechaHoy = date("Y-m-d");
        return view('turnos.create', compact('pacientes', 'especialidades', 'diasEspecialidades', 'turnos', 'fechaHoy'));
    }

    public function validarPaciente ()
    {
        //
        $pacientes      = Paciente::all();

        return view('turnos.validar_paciente', compact('pacientes'));
    }

    public function storePaciente (Request $request) 
    {
        $especialidades    = Especialidad::all();
        $sucursales         = Sucursal::all()
                                ->where('estado',1);

        $pacientes      = Paciente::where('dni', $request->numero_paciente)
                                    ->get();
       
        if (count($pacientes)>0) 
            return view('turnos.validar_especialidad', compact('pacientes', 'sucursales', 'especialidades'));
        else
            return back()->with('mensaje', 'Usuario no registrado'); 
    }

    public function validarEspecialidad() 
    {
        // $especialidades = Especialidad::all();
        // $sucursales     = Sucursal::all();
        // dd($especialidades);
        // return back();
        return view('turnos.validar_especialidad');
    }

    public function storeValidarEspecialidad (Request $request)
    {
       // dd($request->all());
        $request->validate([
            'id_paciente' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required',
            'form_espeacialidad__sucursal' => 'required',
            'form_espeacialidad__especialidad' => 'required'
        ]);

        $pacientes      = Paciente::where('dni', $request->dni)
                                    ->get();

        $sucursales         = Sucursal::all()
                                ->where('estado',1);

        $especialidades = Especialidad::all();

        $turnos         = Turno::select('dia AS daysOfWeek', 'fecha as start', 'hora_inicio AS startTime', 'hora_fin AS endTime')
                                    ->where('sucursal_id', $request->form_espeacialidad__sucursal)
                                    ->where('especialidad_id', $request->form_espeacialidad__especialidad)
                                    ->where('estado', 1)
                                    ->get();
        
        $diasEspecialidades = Sala::select('dia AS daysOfWeek', 'hora_desde AS startTime', 'hora_hasta AS endTime')
                                    ->where('sucursal_id', $request->form_espeacialidad__sucursal)
                                    ->where('especialidad_id', $request->form_espeacialidad__especialidad)
                                    ->where('estado', 1)
                                    ->get();
        // dd($diasEspecialidades);
        $sucursal_select        = $request->form_espeacialidad__sucursal;
        $especialidad_select    = $request->form_espeacialidad__especialidad;
        $fechaHoy = date("Y-m-d");
        $calendarioActivo = 1;


        return view('turnos.calendario_turnos', compact('pacientes', 'especialidades', 'diasEspecialidades', 'turnos', 'fechaHoy', 'sucursales', 'calendarioActivo', 'sucursal_select', 'especialidad_select'));

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
            'id_paciente' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required',
            'form_espeacialidad__sucursal' => 'required',
            'form_espeacialidad__especialidad' => 'required',
            'fecha_id' => 'required',
            'dia' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'consultar' => 'required',
        ]);      


        $salas = Sala::select('*')
                            ->where('sucursal_id', $request->form_espeacialidad__sucursal)
                            ->where('especialidad_id', $request->form_espeacialidad__especialidad)
                            ->where('dia', $request->dia)
                            ->where('estado', 1)
                            ->get();

        $profesional = Profesinal::all()->where('id',$salas[0]->profesional_id);

        $especialidad = Especialidad::all()->where('id', $request->form_espeacialidad__especialidad);

        $sucursal     = Sucursal::all()->where('id',$request->form_espeacialidad__sucursal); 
        // dd($salas);


        $nuevoTurno = new Turno();
        $nuevoTurno->paciente_id                = $request->id_paciente;
        $nuevoTurno->paciente_nombre_apellido   = $request->nombre .' '. $request->apellido;
        $nuevoTurno->paciente_dni                        = $request->dni;

        $nuevoTurno->profesional_id                 = $profesional[0]->id;
        $nuevoTurno->profesional_nombre_apellido    = $profesional[0]->nombre .' '.$profesional[0]->apellido;

        $nuevoTurno->especialidad_id                = $request->form_espeacialidad__especialidad;
        $nuevoTurno->especialidad_nombre            = $especialidad[0]->nombre;

        $nuevoTurno->sucursal_id                = $request->form_espeacialidad__sucursal;
        $nuevoTurno->sucursal_nombre            = $sucursal[0]->nombre;

        $nuevoTurno->sala_id                    = $salas[0]->sala_id;

        $nuevoTurno->fecha                      = $request->fecha_id;
        $nuevoTurno->dia                        = $request->dia;
         // dd( $request->hora_inicio, $request->hora_fin );
        $nuevoTurno->hora_inicio                = $request->hora_inicio; //* 10:30
        $nuevoTurno->hora_fin                   = $request->hora_fin;

        $nuevoTurno->estado = 1;
        $nuevoTurno->save();

        return  redirect()->action('TurnoController@index');;


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
        $turnoEliminar = Turno::findOrFail($id);
        $turnoEliminar->delete();

        return back()->with('mensaje', 'Turno eliminado.');
    }
}
