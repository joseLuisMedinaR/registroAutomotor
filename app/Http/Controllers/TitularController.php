<?php

/**
 * Este código fue desarrollado por Joselu
 * Para cualquier consulta, contactar a contacto@joseluweb.com.ar
 */

namespace App\Http\Controllers;

use App\Models\Titular;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        // Validamos que ningún campo venga vacío y que el dni sea único
        $validatedData = $request->validate([
            'dni' => ['required', 'unique:titulares,dni', 'regex:/^[0-9]{7,10}$/'],
            'apellido' => 'required',
            'nombre' => 'required',
            'domicilio' => 'required',
        ], [
            'apellido.required' => 'El campo apellido es obligatorio',
            'nombre.required' => 'El campo nombre es obligatorio',
            'dni.required' => 'El campo dni es obligatorio',
            'domicilio.required' => 'El campo domicilio es obligatorio',
            'dni.unique' => 'El DNI ingresado ya existe.',
            'dni.regex' => 'El DNI debe contener solo números y tener entre 7 y 10 caracteres.'
        ]);

        // Alta de titular
        $titular = new Titular;
        $titular->apellido = $request->input('apellido');
        $titular->nombre = $request->input('nombre');
        $titular->dni = $request->input('dni');
        $titular->domicilio = $request->input('domicilio');

        if ($titular->save()) {
            return redirect()->route('titular.index');
        } else {
            // En caso de error, devuelve un mensaje de error
            return redirect()->back()->withInput()->withErrors($validatedData);
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
        // Obtener el titular según el ID proporcionado
        $titular = Titular::find($id);

        // Validamos que ningún campo venga vacío y que el dni sea único
        $validatedData = $request->validate([
            'dni' => [
                'required',
                Rule::unique('titulares', 'dni')->ignore($id),
                'regex:/^[0-9]{7,10}$/'
            ],
            'apellido' => 'required',
            'nombre' => 'required',
            'domicilio' => 'required',
        ], [
            'apellido.required' => 'El campo apellido es obligatorio',
            'nombre.required' => 'El campo nombre es obligatorio',
            'dni.required' => 'El campo dni es obligatorio',
            'dni.unique' => 'El DNI ingresado ya existe.',
            'dni.regex' => 'El DNI debe contener solo números y tener entre 7 y 10 caracteres.',
            'domicilio.required' => 'El campo domicilio es obligatorio',
        ]);

        // Verificar si el DNI actual ha cambiado
        if ($request->dni !== $titular->dni) {
            // El DNI ha cambiado, ejecutar la validación de un DNI único
            $validatedData = $request->validate([
                'dni' => [
                    'required',
                    'unique:titulares,dni',
                    'regex:/^[0-9]{7,10}$/'
                ],
            ], [
                'dni.required' => 'El campo dni es obligatorio',
                'dni.unique' => 'El DNI ingresado ya existe.',
                'dni.regex' => 'El DNI debe contener solo números y tener entre 7 y 10 caracteres.'
            ]);
        }

        // Actualizar el titular según el ID proporcionado
        $titular->apellido = $request->apellido;
        $titular->nombre = $request->nombre;
        $titular->dni = $request->dni;
        $titular->domicilio = $request->domicilio;

        if ($titular->save()) {
            return redirect()->route('titular.index');
        } else {
            // En caso de error, devuelve un mensaje de error
            return redirect()->back()->withInput()->withErrors($validatedData);
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
