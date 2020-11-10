<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Sucursal;
use App\SucursalesDias;
use App\Profesinal;
use App\Especialidad;
use App\Sala;

class SalaController extends Controller
{
    
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function consultoSucursalesSalas(Request $request)
    {


        // $input = $request->all();
        // \Log::info($input);
        // return response()->json( ['success'=>'Got Simple Ajax Request.'] );
        $sucursales = Sucursal::all();
        $salas      = sala::all()->where('sucursal_id', $request->sucursal);

        return view('salas.index', compact('salas', 'sucursales'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursales = Sucursal::all();
        $salas      = sala::all();

        return view('salas.index', compact('salas', 'sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sucursales     = Sucursal::all();
        $diasSucursal   = SucursalesDias::all()->where('estado', 1);
        // dd($diasSucursal);
        $profesionales  = Profesinal::all();
        $especialidades = Especialidad::all();

        return view('salas.create', compact('sucursales', 'profesionales', 'especialidades'));
    }

    public function consultoEspecialidad(Request $request) 
    {
        \Log::info($request->all());
   
        return response()->json([
            'success'=>'get your data'
        ]);
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
        // dd($request->all());
        $request->validate([
            'sucursal'      => 'required',
            'sala'          => 'required',
            'profesional'   => 'required',
            'especialidad'  => 'required',
            'estado_dias'   => 'required',
        ]);
        /******************************************************************/
        /*  CARGAR  -  SALA  -  SUCURSAL  -  ESPECIALIDAD  -  PROFESIOANL */ 
        /******************************************************************/

        /* CARGA DIA Y HORARIO DE EN LA SUCURSAL SELECCINADA */
            for ($i=1; $i< (count($request->dias) +1); $i++ )
            {
                
                $nuevaSalaSucursal = new Sala();
                    $nuevaSalaSucursal->sucursal_id     = $request->sucursal;
                    $nuevaSalaSucursal->sala_id         = $request->sala;
                    $nuevaSalaSucursal->profesional_id  = $request->profesional;
                    $nuevaSalaSucursal->especialidad_id = $request->especialidad;
                    $nuevaSalaSucursal->observacion     = $request->observacion;
                    $nuevaSalaSucursal->estado          = $request->estado;

                    $nuevaSalaSucursal->dia             = $request->dias[$i -1];
                    $nuevaSalaSucursal->hora_desde      = $request->hora_apertura[$i -1];  
                    $nuevaSalaSucursal->hora_hasta      = $request->hora_cierre[$i -1];
                    
                    $nuevaSalaSucursal->estado  = 0;
                    for ($ii=0; $ii < count($request->estado_dias); $ii++) 
                        if ( ( $i ) ==  $request->estado_dias[$ii] )
                            $nuevaSalaSucursal->estado  = 1;

                $nuevaSalaSucursal->save();
            }

        /* VUELVO A LA PANTALLA CREATE CON UN MENSAJES */
        return back()->with('mensaje', 'La Sala de la sucursal se agrego correctamente');
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
        $sucursales = Sucursal::all();
        $salas      = sala::findOrFail($id);

        return view('salas.edit', compact('salas', 'sucursales'));
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
