<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Sucursal;
// use App\SucursalesDias;
// use App\Profesinal;
use App\ObraSocial;
use App\Plan;

use App\Cobertura;
use App\Especialidad;
// use App\Sala;
use App\Paciente;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pacientes      = Paciente::all();
        $especialidades = Especialidad::all();
        
        return view('paciente.index', compact('pacientes', 'especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $pacientes      = Paciente::all();
        // $especialidades = Especialidad::all();

        $obraSociales   = ObraSocial::all();
        $planes         = Plan::all();

        return view('paciente.create', compact('obraSociales', 'planes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd( $request->all() );

        $request->validate([
            'nombre'            => 'required',
            'apellido'          => 'required',
            'dni'               => 'required',
            'direccion'         => 'required',
            'email'             => 'required',
            'edad'              => 'required',
            'telefono'          => 'required',
            'codigo_postal'     => 'required',
            'fecha_nacimiento'  => 'required',
            'obra_social'       => 'required',
            'plan'              => 'required',
            'observacion'       => 'required',
            'estado'            => 'required',
        ]);

        $nuevoPaciente                    = new Paciente();
        $nuevoPaciente->nombre            = $request->nombre;
        $nuevoPaciente->apellido          = $request->apellido;
        $nuevoPaciente->dni               = $request->dni;
        $nuevoPaciente->direccion         = $request->direccion;
        $nuevoPaciente->cod_pos           = $request->codigo_postal;
        $nuevoPaciente->edad              = $request->edad;
        $nuevoPaciente->fecha_nacimiento  = $request->fecha_nacimiento;
        $nuevoPaciente->cobertura_id      = $request->plan;
        $nuevoPaciente->nro_afiliado      = $request->nro_afiliado;
        $nuevoPaciente->tipo_usuario      = 1;
        $nuevoPaciente->telefono          = $request->telefono;
        $nuevoPaciente->email             = $request->email;
        $nuevoPaciente->observacion       = $request->observacion;
        $nuevoPaciente->estado            = 1;

        $nuevoPaciente->save();

        return back()->with('mensaje', 'Paciente guardado correctamente');

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
