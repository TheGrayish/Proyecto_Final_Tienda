<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Productos;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class ClienteController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
       
    {   
        
        
       $user_yezael = User::find(1);

       // Asigna el rol 'cliente' al usuario
       $user_yezael->assignRole('admin');

       
        // Utiliza eager loading para cargar la relación 'user'
        $cliente = Cliente::with('user')->get();

        $productos = Productos::all();

        return view('Cliente_index', ['clientes'=> $cliente], ['productos' => $productos]);

      

       // Verificar si el rol 'cliente' ya existe
       if (!Role::where('name', 'cliente')->exists()) {
           $user_ana = User::find(2);

           $user_ana->assignRole('cliente');
       }
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Cliente_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'nombre' => 'required',
            'apellidopa' => 'required',
            'apellidoma' => 'required',
            'telefono' => 'required'
        ]);
    
        // Crear una nueva instancia de Cliente y asignar los valores
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->apellidopa = $request->apellidopa;
        $cliente->apellidoma = $request->apellidoma;
        $cliente->email = $request->email;
        $cliente->password = $request->password;
        $cliente->telefono = $request->telefono;
        // Guardar el nuevo cliente en la base de datos
        $cliente->save();
    
        // Redirigir a la vista de índice de clientes (asegúrate de tener la ruta correcta)
        return redirect()->route('cliente.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('Cliente_Show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('Cliente_edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {       

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'nombre' => 'required',
            'apellidopa' => 'required',
            'apellidoma' => 'required',
            'telefono' => 'required'
        ]);
      
           $cliente->nombre = $request->nombre;
           $cliente->apellidopa = $request->apellidopa;
           $cliente->apellidoma = $request->apellidoma;
           $cliente->email = $request->email;
           $cliente->password = $request->password;
           $cliente->telefono = $request->telefono;
           // Guardar el nuevo cliente en la base de datos
           $cliente->save();
       
           // Redirigir a la vista de índice de clientes (asegúrate de tener la ruta correcta)
           return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('cliente.index');
    }
}
