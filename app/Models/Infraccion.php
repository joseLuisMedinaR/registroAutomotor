<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infraccion extends Model
{
    use HasFactory;
    protected $table = 'infracciones';

    protected $primaryKey="id";
    protected $fileable=['auto_id','fecha', 'descripcion', 'tipo'];
    protected $hidde=['id'];

    public function auto(){
        return $this->hasOne(Auto::class,'id', 'auto_id');
    }
}
