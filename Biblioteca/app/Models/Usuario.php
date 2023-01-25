<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'ap_paterno',
        'ap_materno',
        'fec_nac',
        'direccion',
        'telefono',
    ];

    public function prestamos(){
        return $this->hasMany('App\Models\Prestamo');
    }
}
