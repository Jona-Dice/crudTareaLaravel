<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class proyectos extends Model
{
   //use HasFactory;
   protected $fillable=[    //Con el fillable estamos evitando la asignación masiva
    'nombreProyecto',
    'fuenteFondos',
    'montoPlanificado',
    'montoPatrocinado',
    'montoFondosPropios'
   ];

   protected static function boot(){ //Mientras se esta creando un nuevo proyecto queremos guardar un usuario que este autenticado en ese momento
    parent::boot();
    static::creating(function($proyectos){
        $proyectos->user_id = auth()->id();
    });
    }

public function user():BelongsTo{   //Con el user la relación del proyecto con el usuario
    return $this->belongsTo(User::class);

}

}
