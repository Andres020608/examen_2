<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Joya extends Model
{
    //Atributos para la base de datos
    protected $table ="joyas";
    protected $fillable = ['nombre', 'descripcion', 'precio', 'cantidad'];
    public $timestamps=false;
}
