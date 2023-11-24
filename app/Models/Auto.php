<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;
    protected $table = 'autos';
    protected $primaryKey="id";
    protected $fileable=['titular_id','marca', 'modelo', 'patente', 'tipo'];
    protected $hidde=['id'];

    public function titular(){
        return $this->hasOne(Titular::class,'id', 'titular_id');
    }
}
