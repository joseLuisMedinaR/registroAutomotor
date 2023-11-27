<?php

/**
 * Este código fue desarrollado por Joselu
 * Para cualquier consulta, contactar a contacto@joseluweb.com.ar
 */

namespace App\Http\Controllers;

use App\Models\Infraccion;
use Illuminate\Http\Request;
use App\Models\Auto;
use App\Models\Titular;
use Illuminate\Support\Facades\DB;

class InfraccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infracciones = Infraccion::all();
        return view("infraccion.index", ['infraccion' => $infracciones]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $autos = Auto::select('id', 'patente')->get(); // Obtener solo los campos id y patente de los autos

        // Obtener la cadena del enum desde la base de datos
        $enumValues = DB::select("SHOW COLUMNS FROM infracciones WHERE Field = 'tipo'")[0]->Type;

        // Procesar la cadena para extraer los valores entre comillas simples
        preg_match("/^enum\((.*)\)$/", $enumValues, $matches);
        $values = explode(',', $matches[1]);

        // Eliminar comillas simples de cada valor
        $tiposInfracciones = array_map(function ($value) {
            return trim($value, "'");
        }, $values);
        return view("infraccion.alta", compact('autos', 'tiposInfracciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validamos que ningún campo venga vacío
        $validatedData = $request->validate([
            'auto_id' => 'required|exists:autos,id',
            'fecha' => 'required',
            'descripcion' => 'required',
            'tipo' => 'required',
        ], [
            'auto_id' => 'El id es obligatorio.',
            'fecha' => 'La fecha es obligatoria.',
            'descripcion' => 'El campo descripción es obligatorio.',
            'tipo' => 'El campo tipo es obligatorio.',
        ]);

        // Alta de la nueva infracción
        $infraccion = new Infraccion();
        $infraccion->auto_id = $request->input('auto_id');
        $infraccion->fecha = $request->input('fecha');
        $infraccion->descripcion = $request->input('descripcion');
        $infraccion->tipo = $request->input('tipo');

        if ($infraccion->save()) {
            return redirect()->route('infraccion.index');
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
        // Recuperar la infracción según el ID proporcionado
        $infraccion = Infraccion::find($id);
        $auto = Auto::find($infraccion->auto_id);
        $titular = Titular::find($auto->titular_id);

        // Verificar si se encontró la infracción
        if ($infraccion) {
            // Si se encontró, pasar los datos a la vista 'infraccion.infraccion'
            return  response()->view('infraccion.infraccion', compact('infraccion', 'auto', 'titular'))->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
        } else {
            // Si no se encontró, redirigir
            return redirect()->back()->with('error', 'Infracción no encontrada');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Recuperar la infracción según el ID proporcionado
        $infraccion = Infraccion::find($id);

        if (!$infraccion) {
            return redirect()->back()->with('error', 'Infracción no encontrada');
        }

        $autos = Auto::select('id', 'patente')->get(); // Obtener solo los campos id y patente

        // Obtener la cadena del enum desde la base de datos
        $enumValues = DB::select("SHOW COLUMNS FROM infracciones WHERE Field = 'tipo'")[0]->Type;

        // Procesar la cadena para extraer los valores entre comillas simples
        preg_match("/^enum\((.*)\)$/", $enumValues, $matches);
        $values = explode(',', $matches[1]);

        // Eliminar comillas simples de cada valor
        $tiposInfracciones = array_map(function ($value) {
            return trim($value, "'");
        }, $values);

        // Verificar si se encontró la infracción
        if ($infraccion) {
            // Si se encontró, pasar los datos a la vista 'infraccion.editar'
            return response()->view('infraccion.editar', compact('infraccion', 'autos', 'tiposInfracciones'))->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
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
            'auto_id' => 'required|exists:autos,id',
            'fecha' => 'required',
            'descripcion' => 'required',
            'tipo' => 'required',
        ], [
            'auto_id' => 'El id es obligatorio.',
            'fecha' => 'La fecha es obligatoria.',
            'descripcion' => 'El campo descripción es obligatorio.',
            'tipo' => 'El campo tipo es obligatorio.',
        ]);

        // Actualizar la infracción según el ID proporcionado
        $infraccion = Infraccion::find($id);
        $infraccion->auto_id = $request->auto_id;
        $infraccion->fecha = $request->fecha;
        $infraccion->descripcion = $request->descripcion;
        $infraccion->tipo = $request->tipo;
        $infraccion->save();
        if ($infraccion->save()) {
            return redirect()->route('infraccion.index');
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
        $infraccion = Infraccion::findOrFail($id); // Busca la infracción por su ID

        if ($infraccion) {
            $infraccion->delete(); // Elimina el registro
            return redirect()->route('infraccion.index')->with('success', 'La infracción ha sido eliminado correctamente');
        } else {
            return redirect()->back()->with('error', 'No se encontró la infracción o hubo un problema al eliminarla');
        }
    }
}


/**
 * Este código fue desarrollado por Joselu
 * Para cualquier consulta, contactar a contacto@joseluweb.com.ar
 */
