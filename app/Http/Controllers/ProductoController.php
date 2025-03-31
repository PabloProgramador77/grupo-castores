<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            
            $productos = Producto::orderBy('created_at')->get();

            return view('productos.index', compact('productos'));

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( Request $request )
    {
        try {
            
            $producto = Producto::where('id', '=', $request->id)
                        ->update([

                            'estatus' => 1,

                        ]);

            if( $producto ){

                $datos['exito'] = true;

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json( $datos );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            
            $producto = Producto::create([

                'nombre' => $request->nombre,
                'precio' => $request->precio,
                'estatus' => 1,
                'stock' => 0,

            ]);

            if( $producto && $producto->id ){

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
    public function show(Request $request)
    {
        try {
            
            $producto = Producto::find($request->id);

            if( $producto && $producto->id ){

                $producto->decrement( 'stock', $request->cantidad );
                $producto->save();

                return true;

            }

        } catch (\Throwable $th) {
            
            return false;

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        try {
            
            $producto = Producto::where('id', '=', $request->id)
                        ->update([

                            'stock' => + $request->cantidad,

                        ]);

            if( $producto ){

                return true;

            }

        } catch (\Throwable $th) {
            
            return false;

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            
            $producto = Producto::where('id', '=', $request->id)
                        ->update([

                            'nombre' => $request->nombre,
                            'precio' => $request->precio,

                        ]);

            if( $producto ){

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
            
            $producto = Producto::where('id', '=', $request->id)
                        ->update([
                            
                            'estatus' => 0,

                        ]);

            if( $producto ){

                $datos['exito'] = true;

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json( $datos );
    }

    //Validacion de stock
    public function stock( Request $request ){
        try {
            
            $producto = Producto::find( $request->id );

            if( $producto && $producto->id ){

                if( $request->cantidad > $producto->stock ){

                    return false;

                }else{

                    return true;

                }

            }

        } catch (\Throwable $th) {
            
            echo $th->getMessage();

        }
    }
}
