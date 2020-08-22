<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
	public $table = 'comentarios';
    public $timestamps = false;
     protected $fillable = [
        'comentario', 'idMovie','usuario_id'
    ];
    public function Usuario()
    {
        return $this->belongsTo('App\Usuario');
    }
}
