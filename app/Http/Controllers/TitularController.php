<?php

/**
* Este código fue desarrollado por Joselu
* Para cualquier consulta, contactar a contacto@joseluweb.com.ar
*/

namespace App\Http\Controllers;

use App\Models\Titular;
use Illuminate\Http\Request;

class TitularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulares = Titular::all();
        return view("titular.index", ['titular' => $titulares]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("titular.alta");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validamos que ningún campo venga vacío
        $validatedData = $request->validate([
            'apellido' => 'required',
            'nombre' => 'required',
            'dni' => 'required',
            'domicilio' => 'required',
        ], [
            'apellido' => 'El campo apellido es obligatorio',
            'nombre' => 'El campo nombre es obligatorio',
            'dni' => 'El campo dni es obligatorio',
            'domicilio' => 'El campo domicilio es obligatorio',
        ]);

        //Damos de alta la nueva infracción
        $titular = new Titular;
        $titular->apellido = $request->get('apellido');
        $titular->nombre = $request->get('nombre');
        $titular->dni = $request->get('dni');
        $titular->domicilio = $request->get('domicilio');

        if ($titular->save()) {
            return redirect()->route('titular.index');
        } else {
            // En caso de error, devuelve un mensaje de error
            return redirect()->back()->with('error', 'Hubo un problema al guardar los datos.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Recuperar el titular según el ID proporcionado
        $titular = Titular::find($id);

        // Verificar si se encontró el titular
        if ($titular) {
            // Si se encontró, pasar los datos a la vista 'titular.titular'
            return view('titular.titular', ['titular' => $titular]);
        } else {
            // Si no se encontró, redirigir
            return redirect()->back()->with('error', 'Titular no encontrado');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Recuperar el titular según el ID proporcionado
        $titular = Titular::find($id);

        // Verificar si se encontró el titular
        if ($titular) {
            // Si se encontró, pasar los datos a la vista 'titular.editar'
            return response()->view('titular.editar', ['titular' => $titular])->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
        } else {
            // Si no se encontró, redirigir
            return redirect()->back()->with('error', 'Titular no encontrado');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Validamos que ningún campo venga vacío
        $validatedData = $request->validate([
            'apellido' => 'required',
            'nombre' => 'required',
            'dni' => 'required',
            'domicilio' => 'required',
        ], [
            'apellido' => 'El campo apellido es obligatorio',
            'nombre' => 'El campo nombre es obligatorio',
            'dni' => 'El campo dni es obligatorio',
            'domicilio' => 'El campo domicilio es obligatorio',
        ]);

        // Actualizar el titular según el ID proporcionado
        $titular = Titular::find($id);
        $titular->apellido = $request->apellido;
        $titular->nombre = $request->nombre;
        $titular->dni = $request->dni;
        $titular->domicilio = $request->domicilio;

        if ($titular->save()) {
            return redirect()->route('titular.index');
        } else {
            // En caso de error, devuelve un mensaje de error
            return redirect()->back()->with('error', 'Hubo un problema al guardar los datos.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

/**
* Este código fue desarrollado por Joselu
* Para cualquier consulta, contactar a contacto@joseluweb.com.ar
*/