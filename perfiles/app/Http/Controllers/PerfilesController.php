<?php

namespace App\Http\Controllers;

use App\Models\Perfiles;
use Illuminate\Http\Request;

class PerfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfil = Perfiles::orderBy('nombre')->paginate(5);
        return view('perfil.index', compact('perfil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perfil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1.- Validamos
        $request->validate([
            'nombre' => ['required', 'string', 'min:4', 'max:20', 'unique:perfiles,nombre'],
            'descripcion' => ['required', 'string', 'min:8', 'max:50']
        ]);
        //2.- Procesar
        try {
            Perfiles::create($request->all());
        } catch (\Exception $ex) {
            return redirect()->route('perfiles.index')->with("mensaje", "Error con la BBDD");
        }
        return redirect()->route('perfiles.index')->with("mensaje", "Creado correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfiles  $perfiles
     * @return \Illuminate\Http\Response
     */
    public function show(Perfiles $perfile)
    {
        return view('perfil.show', compact('perfile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfiles  $perfiles
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfiles $perfile)
    {
        return view('perfil.edit', compact('perfile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfiles  $perfiles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfiles $perfile)
    {
        //1.- Validamos
        $request->validate([
            'nombre' => ['required', 'string', 'min:4', 'max:20', 'unique:perfiles,nombre'],
            'descripcion' => ['required', 'string', 'min:8', 'max:50']
        ]);
        //2.- Procesar
        try {
            $perfile->update($request->all());
        } catch (\Exception $ex) {
            return redirect()->route('perfiles.index')->with("mensaje", "Error con la BBDD");
        }
        return redirect()->route('perfiles.index')->with("mensaje", "Actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfiles  $perfiles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfiles $perfile)
    {
        try {
            $perfile->delete();
        } catch (\Exception $ex) {
            return redirect()->route('perfil.index')->with("mensaje", "Error con la BBDD");
        }
        return redirect()->route('perfiles.index')->with("mensaje", "Borrado correctamente");
    }
}
