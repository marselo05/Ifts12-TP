<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Cobertura;
use App\ObraSocial;
use App\Plan;

class CoberturaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = User::all();
        $user = Auth::user();
        $coberturas = ObraSocial::all();

        return view('cobertura.index', compact('coberturas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cobertura.create');
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
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        // Cobertura
            $nuevaObraSocial                 = new ObraSocial();
                $nuevaObraSocial->nombre         = $request->nombre;
                $nuevaObraSocial->descripcion    = $request->descripcion;
                $nuevaObraSocial->estado         = $request->estado;
            $nuevaObraSocial->save();

            $nuevaObraSocialId = ObraSocial::latest('id')->first();

        // Planes
            if ($request->estado_plan_1 != null) 
            {
                $nuevoPlan1                  = new Plan();
                $nuevoPlan1->nombre          = $request->nombre_plan_1;
                $nuevoPlan1->descripcion     = $request->descripcion_plan_1;
                $nuevoPlan1->obra_social_id  = $nuevaObraSocialId->id;
                $nuevoPlan1->estado          = $request->estado_plan_1;
                $nuevoPlan1->save();

            }
            
            if ($request->estado_plan_2 != null) 
            {
                $nuevoPlan2                  = new Plan();
                $nuevoPlan2->nombre          = $request->nombre_plan_2;
                $nuevoPlan2->descripcion     = $request->descripcion_plan_2;
                $nuevoPlan2->obra_social_id  = $nuevaObraSocialId->id;
                $nuevoPlan2->estado          = $request->estado_plan_2;
                $nuevoPlan2->save();

            }
             
            if ($request->estado_plan_3 != null) 
            {
                $nuevoPlan3                  = new Plan();
                $nuevoPlan3->nombre          = $request->nombre_plan_3;
                $nuevoPlan3->descripcion     = $request->descripcion_plan_3;
                $nuevoPlan3->obra_social_id  = $nuevaObraSocialId->id;
                $nuevoPlan3->estado          = $request->estado_plan_3;
                $nuevoPlan3->save();

            }
            
            if ($request->estado_plan_4 != null) 
            {
                $nuevoPlan4                  = new Plan();
                $nuevoPlan4->nombre          = $request->nombre_plan_4;
                $nuevoPlan4->descripcion     = $request->descripcion_plan_4;
                $nuevoPlan4->obra_social_id  = $nuevaObraSocialId->id;
                $nuevoPlan4->estado          = $request->estado_plan_4;
                $nuevoPlan4->save();
            }
            
            if ($request->estado_plan_5 != null) 
            {
                $nuevoPlan5                  = new Plan();
                $nuevoPlan5->nombre          = $request->nombre_plan_5;
                $nuevoPlan5->descripcion     = $request->descripcion_plan_5;
                $nuevoPlan5->obra_social_id  = $nuevaObraSocialId->id;
                $nuevoPlan5->estado          = $request->estado_plan_5;
                $nuevoPlan5->save();

            }

        return back()->with('mensaje', 'Cobertura agregada');
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
