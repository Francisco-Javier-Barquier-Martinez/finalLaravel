<?php

namespace App\Http\Controllers;

use App\Models\Perfiles;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Exception;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::orderBy('nomusu')->paginate(5);
        return view('usuario.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfil = Perfiles::getArrayIdNombre();
        return view('usuario.create', compact('perfil'));
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
            'nomusu' => ['required', 'string', 'min:3', 'max:50', 'unique:usuarios,nomusu'],
            'mail' => ['required', 'string', 'min:3', 'max:90'],
            'localidad' => ['required', 'string', 'min:3', 'max:90']
        ]);
        //2.- Procesar
        try {
            Usuarios::create($request->all());
        } catch (Exception $ex) {
            return redirect()->route('usuarios.index')->with("mensaje", "Error con la BBDD" . $ex->getMessage());
        }
        return redirect()->route('usuarios.index')->with("mensaje", "Usuario creado correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuarios $usuario)
    {
        return view('usuario.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuarios $usuario)
    {
        $perfil = Perfiles::getArrayIdNombre();
        return view('usuario.edit', compact('perfil', 'usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuarios $usuario)
    {
        //1. Validamos
        $request->validate([
            'nomusu' => ['required', 'string', 'min:3', 'max:30', 'unique:usuarios,nomusu'],
            'localidad' => ['required', 'string', 'min:1', 'max:50'],
            'mail' => ['required', 'string', 'min:10', 'max:200']
        ]);

        //2. Proceso los datos
        try {
            $usuario->update($request->all());
        } catch (Exception $ex) {
            return redirect()->route('usuarios.index')->with('mensaje', 'Error al procesar los datos: ' . $ex->getMessage());
        }
        return redirect()->route('usuarios.index')->with('mensaje', 'Usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuarios $usuario)
    {
        try {
            $usuario->delete();
        } catch (Exception $ex) {
            return redirect()->route('usuarios.index')->with('mensaje', 'Error en la base de datos');
        }
        return redirect()->route('usuarios.index')->with('mensaje', 'Usuario eliminado correctamente');
    }
}
