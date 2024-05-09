<?php

namespace App\Http\Controllers;


use App\Models\Aeropuerto;
use App\Models\Compania;
use App\Models\Vuelo;
use Illuminate\Http\Request;


class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $order = $request->query('order', 'salida');
        $order_dir = $request->query('order_dir', 'asc');

        $vuelos = Vuelo::orderBy($order, $order_dir)->paginate(10);

        return view('vuelos.index', [
        	'vuelos' => $vuelos,
            'order' => $order,
            'order_dir' => $order_dir,
    	]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vuelos.create', [
            'companias' => Compania::all(),
            'aeropuertos' => Aeropuerto::all(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'codigo' => 'required|max:255',
            'origen_id' => 'exists:aeropuertos,id|required',
            'destino_id' => 'exists:aeropuertos,id|required',
            'compania_id' => 'exists:companias,id|required',
            'salida' => 'required',
            'llegada' => 'required',
            'plazas' => 'required|integer',
            'precio' => 'required',
        ]);


        $vuelo = new Vuelo();
        $vuelo->codigo = $validated['codigo'];
        $vuelo->origen_id = $validated['origen_id'];
        $vuelo->destino_id = $validated['destino_id'];
        $vuelo->compania_id = $validated['compania_id'];
        $vuelo->salida = $validated['salida'];
        $vuelo->llegada = $validated['llegada'];
        $vuelo->plazas = $validated['plazas'];
        $vuelo->precio = $validated['precio'];
        $vuelo->save();
        session()->flash('success', 'El vuelo se ha creado correctamente.');
        return redirect()->route('vuelos.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Vuelo $vuelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vuelo $vuelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vuelo $vuelo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vuelo $vuelo)
    {
        //
    }
}
