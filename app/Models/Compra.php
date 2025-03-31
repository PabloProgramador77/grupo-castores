<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    
    protected $table = 'compras';

    protected $fillable = [
        'idProducto', 'cantidad', 'idUser',
    ];

    public function producto(){

        return $this->belongsTo( Producto::class, 'idProducto', 'id');

    }

    public function usuario(){

        return $this->belongsTo( User::class, 'idUser', 'id');
        
    }
}
