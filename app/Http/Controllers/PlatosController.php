<?php

namespace App\Http\Controllers;

use App\Models\Platos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['platos']=Platos::paginate(7);
        return view('platos.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('platos.create');
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

        //validaciones

        $campos=[
            'nombre'=>'required',
            'categoria'=>'required',
            'precio'=>'required',
            'foto'=>'required',           
        ];

        $mensaje=[
            'required'=>':attribute es requerido',
            
        ];

        $this->validate($request,$campos,$mensaje);





        $datosPlatos = request()->except('_token');
       
        if($request->hasFile('foto')){
            $datosPlatos['foto']=$request->file('foto')->store('uploads','public');
        }
       
        Platos::insert($datosPlatos);
            
       // return response()->json($datosPlatos);
       return redirect('platos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Platos  $platos
     * @return \Illuminate\Http\Response
     */
    public function show(Platos $platos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Platos  $platos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //editar
        $platos=Platos::findOrFail($id);
        return view('platos.edit', compact('platos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Platos  $platos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //actualizar


        //validaciones

        $campos=[
            'nombre'=>'required',
            'categoria'=>'required',
            'precio'=>'required',
            'foto'=>'required',           
        ];

        $mensaje=[
            'required'=>':attribute es requerido',
            
        ];

        $this->validate($request,$campos,$mensaje);


            //almacenar y borrar las fotos
        $datosPlatos = request()->except(['_token','_method']);
       
        if($request->hasFile('foto')){
            $platos=Platos::findOrFail($id);

            Storage::delete('public/'.$platos->foto);

            $datosPlatos['foto']=$request->file('foto')->store('uploads','public');
        }
       
        Platos::where('id','=',$id)->update($datosPlatos);
        $platos=Platos::findOrFail($id);
        return view('platos.edit', compact('platos'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Platos  $platos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //borrar
        $platos=Platos::findOrFail($id);

        if(Storage::delete('public/'.$platos->foto)){
           
            Platos::destroy($id);
        }  

        
         return redirect('platos');
    }
}
