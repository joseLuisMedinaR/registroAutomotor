<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titular extends Model
{
    use HasFactory;
    protected $table = 'titulares';
    protected $primayKey="id";
    protected $fileable=['apellido', 'nombre', 'dni', 'domicilio'];
    protected $hidden=['id'];
}
