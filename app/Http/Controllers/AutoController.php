<?php

/**
* Este código fue desarrollado por Joselu
* Para cualquier consulta, contactar a contacto@joseluweb.com.ar
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;
use App\Models\Titular;
use Illuminate\Support\Facades\DB;

class AutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autos = Auto::all();
        return view("auto.index", ['auto' => $autos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titulares = Titular::select('id', 'apellido', 'nombre')->get(); // Obtener solo los campos id, apellido y nombre de los titulares

        // Obtener la cadena del enum desde la base de datos
        $enumValues = DB::select("SHOW COLUMNS FROM autos WHERE Field = 'tipo'")[0]->Type;

        // Procesar la cadena para extraer los valores entre comillas simples
        preg_match("/^enum\((.*)\)$/", $enumValues, $matches);
        $values = explode(',', $matches[1]);

        // Eliminar comillas simples de cada valor
        $tiposAutos = array_map(function ($value) {
            return trim($value, "'");
        }, $values);

        return view("auto.alta", compact('titulares', 'tiposAutos'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validamos que ningún campo venga vacío
        $validatedData = $request->validate([
            'titular_id' => 'required|exists:titulares,id',
            'marca' => 'required',
            'modelo' => 'required',
            'patente' => 'required',
            'tipo' => 'required',
        ], [
            'titular_id.required' => 'El campo titular es obligatorio.',
            'marca.required' => 'El campo marca es obligatorio.',
            'modelo.required' => 'El campo modelo es obligatorio.',
            'patente.required' => 'El campo patente es obligatorio.',
            'tipo.required' => 'El campo tipo es obligatorio.',
        ]);

        //Insertamos el auto nuevo
        $auto = new Auto;
        $auto->titular_id = $request->input('titular_id');
        $auto->marca = $request->input('marca');
        $auto->modelo = $request->input('modelo');
        $auto->patente = $request->input('patente');
        $auto->tipo = $request->input('tipo');

        if ($auto->save()) {
            return redirect()->route('auto.index');
        } else {
            return redirect()->back()->with('error', 'Hubo un problema al guardar los datos.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Recuperar el auto según el ID proporcionado
        $auto = Auto::find($id);
        $titular = Titular::find($auto->titular_id);

        // Verificar si se encontró el auto
        if ($auto) {
            // Si se encontró, pasar los datos a la vista 'auto.auto'
            return view('auto.auto', compact('auto', 'titular'));
        } else {
            // Si no se encontró, redirigir
            return redirect()->back()->with('error', 'Auto no encontrado');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Recuperar el auto según el ID proporcionado
        $auto = Auto::find($id);

        $titulares = Titular::select('id', 'apellido', 'nombre')->get(); // Obtener solo los campos id, apellido y nombre de los titulares

        // Recuperar el titular por defecto
        $titularPorDefecto = Titular::find($auto->titular_id);

        // Obtener la cadena del enum desde la base de datos
        $enumValues = DB::select("SHOW COLUMNS FROM autos WHERE Field = 'tipo'")[0]->Type;

        // Procesar la cadena para extraer los valores entre comillas simples
        preg_match("/^enum\((.*)\)$/", $enumValues, $matches);
        $values = explode(',', $matches[1]);

        // Eliminar comillas simples de cada valor
        $tiposAutos = array_map(function ($value) {
            return trim($value, "'");
        }, $values);

        // Verificar si se encontró el auto
        if ($auto) {
            // Si se encontró, pasar los datos a la vista 'auto.editar'
            return response()->view('auto.editar', compact('auto', 'titulares', 'titularPorDefecto', 'tiposAutos'))->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
        } else {
            // Si no se encontró, redirigir
            return redirect()->back()->with('error', 'Auto no encontrado');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Validamos que ningún campo venga vacío
        $validatedData = $request->validate([
            'titular_id' => 'required|exists:titulares,id',
            'marca' => 'required',
            'modelo' => 'required',
            'patente' => 'required',
            'tipo' => 'required',
        ], [
            'titular_id.required' => 'El campo titular es obligatorio.',
            'marca.required' => 'El campo marca es obligatorio.',
            'modelo.required' => 'El campo modelo es obligatorio.',
            'patente.required' => 'El campo patente es obligatorio.',
            'tipo.required' => 'El campo tipo es obligatorio.',
        ]);


        // Actualizar el auto según el ID proporcionado
        $auto = Auto::find($id);
        $auto->titular_id = $request->titular_id;
        $auto->marca = $request->marca;
        $auto->modelo = $request->modelo;
        $auto->patente = $request->patente;
        $auto->tipo = $request->tipo;

        if ($auto->save()) {
            return redirect()->route('auto.index');
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