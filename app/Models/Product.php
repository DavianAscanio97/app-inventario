<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'stock',
        'active',
        'image',
        'description'
    ];

    //protected -> no se puede modificar
    //private -> se puede modificar siempre y cuando (getter(obtener) y setter(modificar))
    //public -> se puede modificar siempre
}


