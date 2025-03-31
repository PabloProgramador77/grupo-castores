<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductoController;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            
            $ventas = Venta::orderBy('created_at', 'desc')->get();

            return view('productos.ventas.index', compact('ventas'));

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

            $productoCtrlr = new ProductoController();
            
            if( $productoCtrlr->stock( $request ) ) {

                $venta = Venta::create([

                    'idProducto' => $request->id,
                    'cantidad' => $request->cantidad,
                    'idUser' => Auth::user()->id,
    
                ]);
    
                if( $venta && $venta->id ){
    
                    $productoCtrlr = new ProductoController();
                    $datos['exito'] = $productoCtrlr->show( $request );
    
                }

            }else{

                $datos['exito'] = false;
                $datos['mensaje'] = 'Cantidad de venta mayor al stock.';

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
