<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $fillable = ['cliente', 'tipo', 'detalle', 'email', 'celular', 'plazo', 'cotizacion', 'estado'];

    protected $dates = ['plazo'];
}
