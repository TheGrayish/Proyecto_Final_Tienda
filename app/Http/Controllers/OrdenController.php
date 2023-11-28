<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Productos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdenController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Obtén el ID del usuario autenticado
    $userID = Auth::id();

     // Carga las relaciones necesarias (en este caso, la relación con productos)
     $ordenes = Orden::with('producto')->get();
    
    $productos = Productos::all();

    // Calculate the total price
    $totalPrice = $ordenes->sum(function ($orden) {
        return $orden->producto->precio;
    });

    return view('Orden_index', ['userID' => $userID, 'productos' => $productos, 'ordenes' => $ordenes, 'totalPrice' => $totalPrice]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos si es necesario
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'FechaEstado' => 'required',
            // Agrega más validaciones según sea necesario
        ]);
    
        // Obtén el ID del usuario autenticado
        $userID = Auth::id();
    
        // Crear una nueva orden y asignar valores
        $orden = new Orden();
        $orden->producto_id = $request->input('producto_id');
        $orden->FechaEstado = $request->input('FechaEstado');
        $orden->usuario_id = $userID;

        // Otras asignaciones y almacenamiento
    
        $orden->save();  
    
        // Puedes redirigir a una página de éxito o hacer lo que necesites aquí
        return redirect()->route('orden.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orden $orden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orden $orden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orden $orden)
    {
        // Delete the order
        $orden->delete();

        return redirect()->route('orden.index')->with('success', 'Order deleted successfully!');
    }
}
