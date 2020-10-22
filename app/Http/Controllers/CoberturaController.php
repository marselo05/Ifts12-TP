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

       // dd($user->obraSocial);
        $obras_sociales = $user->obraSocial;
        // dd($obras_sociales[0]);

        //obteniendo los tasks asociados al User
        // print_r('<pre>');
        // foreach ($user->obraSocial as $cobertura) 
        // {
        //     var_dump($cobertura->nombre);
        //     //obteniendo los datos de un cobertura específico
        //     // echo $cobertura->nombre;
        //     //obteniendo datos de la tabla pivot por cobertura
        //     // echo $cobertura->pivot->obra_social_id;
        //     // echo $cobertura->pivot->nombre;

        //     // echo $cobertura->pivot->status;
        // }
        // print_r('</pre>');

        // //obteniendo los tasks asociados al User
        // foreach ($user->plan as $pl) {
        //     //obteniendo los datos de un task específico
        //     echo $pl->nombre;
        //     //obteniendo datos de la tabla pivot por task
        //     echo $pl->pivot->plan_id;
        //     echo $pl->pivot->status;
        // }
        // // exit();
        // //
        // $coberturas = CoberturaUsuario::all()->where('user_id', $user->id);
        // dd($coberturas);
        // exit();

        return view('cobertura.index', compact('obras_sociales'));
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
                // dd($nuevaObraSocialId);
                $nuevoPlan                  = new Plan();
                $nuevoPlan->nombre          = $request->nombre_plan_1;
                $nuevoPlan->descripcion     = $request->descripcion_plan_1;
                $nuevoPlan->estado          = $request->estado_plan_1;
                $nuevoPlan->save();

                $nuevoPlanId = Plan::latest('id')->first();

            }

            $nuevaCobertura                  = new Cobertura();
                $nuevaCobertura->status          = $request->estado;
                $nuevaCobertura->obra_social_id  = $nuevaObraSocialId;
                $nuevaCobertura->plan_id         = $nuevoPlanId;
            $nuevaCobertura->save();
            // else if ($request->estado_plan_2 != null) 
            // {
            //     $nuevoPlan                  = new Plan();
            //     $nuevoPlan->nombre          = $request->nombre_plan_2;
            //     $nuevoPlan->descripcion     = $request->descripcion_plan_2;
            //     $nuevoPlan->estado          = $request->estado_plan_2;
            //     $nuevoPlan->save();

            //     $nuevoPlanId = Plan::latest('id')->first();
                
            //     $nuevaCobertura                  = new Cobertura();
            //         $nuevaCobertura->status          = $request->estado;
            //         $nuevaCobertura->obra_social_id  = $nuevaObraSocialId;
            //         $nuevaCobertura->plan_id         = $nuevoPlanId;
            //     $nuevaCobertura->save();

            // }
            // else if ($request->estado_plan_3 != null) 
            // {
            //     $nuevoPlan                  = new Plan();
            //     $nuevoPlan->nombre          = $request->nombre_plan_3;
            //     $nuevoPlan->descripcion     = $request->descripcion_plan_3;
            //     $nuevoPlan->estado          = $request->estado_plan_3;
            //     $nuevoPlan->save();

            //     $nuevoPlanId = Plan::latest('id')->first();
                
            //     $nuevaCobertura                  = new Cobertura();
            //         $nuevaCobertura->status          = $request->estado;
            //         $nuevaCobertura->obra_social_id  = $nuevaObraSocialId;
            //         $nuevaCobertura->plan_id         = $nuevoPlanId;
            //     $nuevaCobertura->save();

            // }
            // else if ($request->estado_plan_4 != null) 
            // {
            //     $nuevoPlan                  = new Plan();
            //     $nuevoPlan->nombre          = $request->nombre_plan_4;
            //     $nuevoPlan->descripcion     = $request->descripcion_plan_4;
            //     $nuevoPlan->estado          = $request->estado_plan_4;
            //     $nuevoPlan->save();

            //     $nuevoPlanId = Plan::latest('id')->first();
                
            //     $nuevaCobertura                  = new Cobertura();
            //         $nuevaCobertura->status          = $request->estado;
            //         $nuevaCobertura->obra_social_id  = $nuevaObraSocialId;
            //         $nuevaCobertura->plan_id         = $nuevoPlanId;
            //     $nuevaCobertura->save();

            // }
            // else if ($request->estado_plan_5 != null) 
            // {
            //     $nuevoPlan                  = new Plan();
            //     $nuevoPlan->nombre          = $request->nombre_plan_5;
            //     $nuevoPlan->descripcion     = $request->descripcion_plan_5;
            //     $nuevoPlan->estado          = $request->estado_plan_5;
            //     $nuevoPlan->save();

            //     $nuevoPlanId = Plan::latest('id')->first();
                
            //     $nuevaCobertura                  = new Cobertura();
            //         $nuevaCobertura->status          = $request->estado;
            //         $nuevaCobertura->obra_social_id  = $nuevaObraSocialId;
            //         $nuevaCobertura->plan_id         = $nuevoPlanId;
            //     $nuevaCobertura->save();

            // }
            // $nuevoPlan->save();

            // $nuevoPlanId = Plan::latest('id')->first();
            // dd($nuevoPlanId);
            // // Cobertura
            // $nuevaCobertura                  = new Cobertura();
            // $nuevaCobertura->status          = $request->estado;
            // $nuevaCobertura->obra_social_id  = $nuevaObraSocialId;
            // $nuevaCobertura->plan_id         = $nuevoPlanId;
            // $nuevaCobertura->save();
            dd('Cobertura agregada');
        return back()->with('mensjae', 'Cobertura agregada');

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
