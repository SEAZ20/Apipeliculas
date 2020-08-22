<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public $table = 'usuarios';
    public $timestamps = false;
     protected $fillable = [
        'nombre', 'email', 'password'
    ];
    public function Comentario()
    {
        return $this->hasMany('App\Comentario');
    }
}
