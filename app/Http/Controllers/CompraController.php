<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductoController;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            
            $compras = Compra::orderBy('created_at', 'desc')->get();

            return view('productos.compras.index', compact('compras'));

        } catch (\Throwable $th) {
            //throw $th;
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

            if( $request->cantidad <= 0 ){

                $datos['exito'] = false;
                $datos['mensaje'] = 'Cantidad invalida.';

            }else{

                $compra = Compra::create([

                    'idProducto' => $request->id,
                    'idUser' => Auth::user()->id,
                    'cantidad' => $request->cantidad,
    
                ]);
    
                if( $compra && $compra->id ){
    
                    $productoCtrlr = new ProductoController();
    
                    $datos['exito'] = $productoCtrlr->edit( $request );
    
                }

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
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
