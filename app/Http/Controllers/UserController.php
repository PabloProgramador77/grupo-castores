<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            
            $usuarios = User::all();
            $roles = Role::all();
            return view('usuarios.index', compact('usuarios', 'roles'));

        } catch (\Throwable $th) {
            
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            
            $usuario = User::create([

                'name' => $request->nombre,
                'email' => $request->email,
                'password' => bcrypt("123456"),

            ]);

            if( $usuario && $usuario->id ){

                $usuario->syncRoles( $request->rol );

                $datos['exito'] = true;

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json( $datos );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
        
            $usuario = User::where('id', '=', $request->id)
                        ->update([

                            'name' => $request->nombre,
                            'email' => $request->email,

                        ]);

            if( $usuario ){

                $user = User::find( $request->id );
                $user->syncRoles( $request->rol );
            
                $datos['exito'] = true;

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json( $datos );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
        
            $usuario = User::find( $request->id );

            if( $usuario ){

                $usuario->delete();
                
                $datos['exito'] = true;

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json( $datos );
    }
}
