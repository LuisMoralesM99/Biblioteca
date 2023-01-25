<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibrosController extends Controller
{
    public function index(){
        $libros = Libro::all();
        return view('principal')
        ->with('libros',$libros);
    }

    public function create(){
        return view('principal');
    }

    public function store(Request $request){
        $request->validate([
            'cantidad' => 'required',
            'titulo' => 'required',
            'autor' => 'required',
            'editorial' => 'required',
            'año' => 'required'
        ]);

        $libros = new Libro();

        $libros->cantidad = $request->get('cantidad');
        $libros->titulo = $request->get('titulo');
        $libros->autor = $request->get('autor');
        $libros->editorial = $request->get('editorial');
        $libros->año = $request->get('año');
        $libros->save();

        return redirect('principal')
        ->with('alerta', 'Libro añadido satisfactoriamente');
    }

    public function update(Request $request, $id){
        $libro = Libro::find($id);

        $libro->cantidad = $request->get('cantidad');
        $libro->titulo = $request->get('titulo');
        $libro->autor = $request->get('autor');
        $libro->editorial = $request->get('editorial');
        $libro->año = $request->get('año');
        $libro->save();

        return redirect('principal')
        ->with('alerta', 'Libro modificado satisfactoriamente');
    }

    public function destroy($id){
        $libro = Libro::find($id);
        $libro->delete();

        return redirect('principal')
        ->with('alerta', 'Libro eliminado satisfactoriamente');
    }
}
