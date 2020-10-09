<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Sucursal;
use App\SucursalesDias;

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
        $sucursales = Sucursal::where('estado', 1)
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
            $sucursalNueva              = new Sucursal;
            $sucursalNueva->nombre      = $request->nombre;
            $sucursalNueva->direccion   = $request->direccion;
            $sucursalNueva->telefono    = $request->telefono;
            $sucursalNueva->estado      = $request->estado;
            $sucursalNueva->save();
        
        // OBTENGO EL NÚMERO DE ID DE LA SUCURSAL GENERADA
            $sucursalNuevaId = Sucursal::latest('id')->first();

        /* CARGA DIA Y HORARIO DE EN LA SUCURSAL SELECCINADA */
            for ($i=1; $i< (count($request->dias) +1); $i++ )
            {
             
                $sucursalDiaNueva                      = new SucursalesDias;
                $sucursalDiaNueva->dia                 = $request->dias[$i -1];
                $sucursalDiaNueva->hora_apertura       = $request->hora_apertura[$i -1];  
                $sucursalDiaNueva->hora_cierre         = $request->hora_cierre[$i -1];
                $sucursalDiaNueva->id_sucursal         = $sucursalNuevaId->id;
                $sucursalDiaNueva->id_sucursal_dia     = $sucursalNuevaId->id;
                
                $sucursalDiaNueva->estado  = 0;
                for ($ii=0; $ii < count($request->estado_dias); $ii++) 
                    if ( ( $i ) ==  $request->estado_dias[$ii] )
                        $sucursalDiaNueva->estado  = 1;

                $sucursalDiaNueva->save();
            }
        /* VUELVO A LA PANTALLA CREATE CON UN MENSAJES */
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
        $sucursales = Sucursal::findOrFail($id);
        $semana = [ 'semana','Lunes','Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
        //
        return view('sucursal.edit', compact('sucursales', 'semana'));
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
            'direccion' => 'required',
            'telefono' => 'required'
        ]);
        //
        $sucursalActualizada               = Sucursal::find($id);
        $sucursalActualizada->nombre       = $request->nombre;
        $sucursalActualizada->direccion    = $request->direccion;
        $sucursalActualizada->telefono     = $request->telefono;
        $sucursalActualizada->save();
        
        for ($i=1; $i< (count($request->dias) +1); $i++ )
        {
         
            $sucursalDiaNueva                      = SucursalesDias::find( $request->dias[$i - 1] );
            $sucursalDiaNueva->hora_apertura       = $request->hora_apertura[$i -1];  
            $sucursalDiaNueva->hora_cierre         = $request->hora_cierre[$i -1];
            $sucursalDiaNueva->id_sucursal         = $id;
            $sucursalDiaNueva->id_sucursal_dia     = $id;
            
            $sucursalDiaNueva->estado  = 0;
            for ($ii=0; $ii < count($request->estado_dias); $ii++) 
                if ( ( $i ) ==  $request->estado_dias[$ii] ) 
                    $sucursalDiaNueva->estado  = 1;

           $sucursalDiaNueva->save();
        }
        return back()->with('mensaje', 'Sucursal editada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sucursalEliminar = Sucursal::findOrFail($id);
        $sucursalEliminar->delete();

        $sucursalHorarioEliminar = SucursalesDias::where('id_sucursal', $id);
        $sucursalHorarioEliminar->delete();

        return back()->with('mensaje', 'Sucursal eliminada.');
    }
}
