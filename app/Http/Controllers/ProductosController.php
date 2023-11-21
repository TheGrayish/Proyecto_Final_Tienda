<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        $productos = Productos::all(); // Obtener todos los productos
        
        return view('Productos_index', ['productos' => $productos]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Productos_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'nombre' => 'required',
            'stock' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validar la imagen
        ]);
    
        // Obtener la imagen del formulario
        $imagen = $request->file('imagen');
        $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
    
        // Guardar la imagen en la carpeta "storage/app/public/images"
        $imagen->storeAs('public/images', $nombreImagen);
    
        $productos = new Productos();
        $productos->nombre = $request->nombre;
        $productos->descripcion = $request->descripcion;
        $productos->precio = $request->precio;
        $productos->stock = $request->stock;
        $productos->imagen = $nombreImagen; // Guardar el nombre de la imagen, no el objeto de imagen
        $productos->save();
    
        // Redireccionar a la ruta adecuada
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Productos $producto)
    {
        return view('Productos_edit', compact('producto'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Productos $producto)
    {
        $request->validate([
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'nombre' => 'required',
            'stock' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
    
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->storeAs('public/images', $nombreImagen);
    
            // Eliminar la imagen antigua si existe
            if ($producto->imagen) {
                Storage::delete('public/images/' . $producto->imagen);
            }
    
            $producto->imagen = $nombreImagen;
        }
    
        $producto->save();
    
        return redirect()->route('productos.index');
    }
    


    /**
     * Remove the specified resource from storage.
     */
  

     public function destroy(Productos $producto)
     {
         // Eliminar la imagen asociada al producto si existe
         if ($producto->imagen) {
             Storage::delete('public/images/' . $producto->imagen);
         }
     
         $producto->delete();
     
         return redirect()->route('productos.index');
     }
     
 

}
