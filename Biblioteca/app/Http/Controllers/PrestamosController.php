<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Libro;

class PrestamosController extends Controller
{
    public function index(){
        $prestamos = Prestamo::all();
        return view('principal')
        ->with('prestamos',$prestamos);
    }

    public function create(){
        return view('principal');
    }

    public function store(Request $request){
        $request->validate([
            'estado' => 'required',
            'fec_salida' => 'required',
            'user_id' => 'required',
            'libro_id' => 'required',
        ]);

        $prestamos = new Prestamo();
        $libro=Libro::find($request->get('libro_id'));

        if($libro->cantidad > 0){
            $prestamos->estado = $request->get('estado');
            $prestamos->fec_salida = $request->get('fec_salida');
            $prestamos->fec_devolucion = null;
            $prestamos->user_id = $request->get('user_id');
            $prestamos->libro_id = $request->get('libro_id');
            $prestamos->save();

            $libro->cantidad = $libro->cantidad - 1;
            $libro->save();

            $mensaje='Prestamo añadido satisfactoriamente';
            $respuesta='alerta';
        }else{
            $mensaje='No hay libros disponibles';
            $respuesta='error';
        }

        return redirect('principal')
            ->with($respuesta,$mensaje);
    }

    public function update(Request $request, $id){
        $prestamo = Prestamo::find($id);

        $prestamo->estado = $request->get('estado');
        $prestamo->fec_devolucion = $request->get('fec_devolucion');
        $prestamo->save();

        $libro=Libro::find($prestamo->libro_id);
        $libro->cantidad = $libro->cantidad + 1;
        $libro->save();

        return redirect('principal')
        ->with('alerta', 'Prestamo modificado satisfactoriamente');
    }

    public function destroy($id){
        $prestamo = Prestamo::find($id);
        $prestamo->delete();

        return redirect('principal')
        ->with('alerta', 'Prestamo eliminado satisfactoriamente');
    }
}
