<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'nombre', 'precio', 'estatus', 'stock'
    ];

    public function compras(){

        return $this->belongsToMany( Compra::class, 'idProducto', 'id');
        
    }

    public function ventas(){

        return $this->belongsToMany( Venta::class, 'idProducto', 'id');
        
    }
}
