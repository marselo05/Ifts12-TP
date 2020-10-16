<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\CoberturaUsuario;

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
