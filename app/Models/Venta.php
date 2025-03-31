<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';

    protected $fillable = [
        'idProducto', 'cantidad', 'idUser',
    ];

    public function producto(){

        return $this->belongsTo( Producto::class, 'idProducto', 'id');

    }

    public function usuario(){

        return $this->belongsTo( User::class, 'idUser', 'id' );
        
    }
}
