<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sucursales = App\Sucursal::where('estado', 1)->paginate(10);
        $sucursales = App\Sucursal::where('estado', 1)
                        ->with('sucursales_dias')
                        ->get();
        
        // dd( $sucursales );

        return view('sucursal.index', compact('sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sucursal.create');
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
        // VALIDAR LOS DATOS REUQURIDOS
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'dias' => 'required',
            'hora_apertura' => 'required',
            'hora_cierre' => 'required',
            'estado' => 'required'
        ]);
        /******************************************************************/
        /* CARGAR LOS DIAS Y HORARIO EN LA TABLA SUCURSALES_DIAS_HORARIOS */ 
        /******************************************************************/
            $sucursalNueva              = new App\Sucursal;
            $sucursalNueva->nombre      = $request->nombre;
            $sucursalNueva->direccion   = $request->direccion;
            $sucursalNueva->direccion   = $request->telefono;
            $sucursalNueva->estado      = $request->estado;
            $sucursalNueva->save();
        
        // CARGA LOS DIAS EN LA SUCURSAL INGRESADA
            $sucursalNuevaId = App\Sucursal::latest('id')->first();

            foreach ( $request->dias as $dia )
            {
                $sucursalDiaNueva                      = new App\SucursalesDias;
                $sucursalDiaNueva->id_sucursal_dia     = $sucursalNuevaId->id;
                $sucursalDiaNueva->dia                 = $dia;
                $sucursalDiaNueva->hora_apertura       = $request->hora_apertura[ $dia - 1 ];  
                $sucursalDiaNueva->hora_cierre         = $request->hora_cierre[ $dia - 1 ];
                $sucursalDiaNueva->estado              = $request->estado;
                $sucursalDiaNueva->save();
            }

        return back()->with('mensaje', 'Sucursal agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $sucursales = App\Sucursal::where('id', $id)
                        ->with('sucursales_dias')
                        ->get();
        // $sucursales = App\Sucursal::findOrFail($id);
        // dd($sucursales[0]->sucursales_dias[0]);
        
        //
        return view('sucursal.edit', compact('sucursales'));
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
