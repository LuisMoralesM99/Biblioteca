<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;
    protected $table = 'prestamos';
    public $timestamps = false;

    protected $fillable = [
        'estado',
        'fec_salida',
        'fec_devolucion',
        'user_id',
        'libro_id',
    ];

    public function usuario(){
        return $this->belongsTo('App\Models\Usuario','user_id');
    }

    public function libro(){
        return $this->belongsTo('App\Models\Libro');
    }
}
