<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados']=empleado::paginate(1);
        return view('empleado.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleado.create'); 
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
        $campos=[
        'nombre'=>'required|string|max:100',
        'apellidopaterno'=>'required|string|max:100',
        'apellidomaterno'=>'required|string|max:100',
        'correo'=>'required|email',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request,$campos,$mensaje);

        //$datosempleado = request() ->all();
       
        $datosempleado = request()->except('_token');
        empleado::insert($datosempleado);

        //return response() ->json($datosempleado);
        return redirect('empleado')->with('mensaje','empleado agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($emp)
    {
    
        
        //
        
        $empleado=empleado::findOrfail($emp);
    return view('empleado.edit', compact('empleado') );
      
        return redirect('empleado')->with('mensaje','empleado modificado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
            'apellidopaterno'=>'required|string|max:100',
            'apellidomaterno'=>'required|string|max:100',
            'correo'=>'required|email',
            ];
            $mensaje=[
                'required'=>'El :attribute es requerido',
            ];
            $this->validate($request,$campos,$mensaje);
    
        //
        $datosempleado = request()->except(['_token','_method']);
        empleado::where('id',$id)->update($datosempleado);
       
        $empleado=empleado::findOrfail($id);
    return redirect('/empleado');

        return redirect('empleado')->with('mensaje','empleado modificado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        empleado::destroy($id);
        return redirect('empleado')->with('mensaje','empleado borrado');
    }
}
