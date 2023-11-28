<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoria = Categoria::all();
        
        return view('Categoria/categoria_index', ['categorias' => $categoria]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Categoria/categoria_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);
    
        // Crear una nueva instancia de categoria y asignar los valores
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        // Guardar el nuevo categoria en la base de datos
        $categoria->save();
    
        // Redirigir a la vista de índice de categorias (asegúrate de tener la ruta correcta)
        return redirect()->route('categoria.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        // return view('Categoria/categoria_edit', compact('categoria'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        // $request->validate([
        //     'nombre' => 'required',
        // ]);
    
        // // Asignar los nuevos valores y guardar en la base de datos
        // $categoria->nombre = $request->nombre;
        // $categoria->save();
    
        // // Redirigir a la vista de índice de categorias
        // return redirect()->route('categoria.index');
    }    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        // $categoria->delete();
     
        // return redirect()->route('categoria.index');
    }

}
