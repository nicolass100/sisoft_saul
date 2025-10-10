<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Campos permitidos para inserción/actualización masiva
    protected $fillable = [
        'nombre',
        'sku',
        'precio',
        'stock',
        'descripcion',
        'imagen',
    ];
}
