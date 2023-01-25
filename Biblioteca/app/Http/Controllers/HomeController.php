<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Libro;
use App\Models\Prestamo;

class HomeController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        $libros = Libro::all();
        $prestamos = Prestamo::all();
        $consulta = Prestamo::all()->where('estado',"=","Prestamo");
        return view('principal')
        ->with('usuarios',$usuarios)
        ->with('libros',$libros)
        ->with('prestamos',$prestamos)
        ->with('consulta',$consulta);
    }
}
