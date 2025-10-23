<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
        'correo',
        'telefono',
        'direccion',
        'metodo_envio',
        'metodo_pago',
        'total',
    ];
}
