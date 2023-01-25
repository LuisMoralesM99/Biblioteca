<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    public function index(){
        $usuarios = Usuario::all();
        return view('principal')
        ->with('usuarios',$usuarios);
    }

    public function create(){
        return view('principal');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'ap_paterno' => 'required',
            'ap_materno' => 'required',
            'fec_nac' => 'required',
            'direccion' => 'required',
            'telefono' => 'required'
        ]);

        $usuarios = new Usuario();

        $usuarios->nombre = $request->get('nombre');
        $usuarios->ap_paterno = $request->get('ap_paterno');
        $usuarios->ap_materno = $request->get('ap_materno');
        $usuarios->fec_nac = $request->get('fec_nac');
        $usuarios->direccion = $request->get('direccion');
        $usuarios->telefono = $request->get('telefono');
        $usuarios->save();

        return redirect('principal')
        ->with('alerta', 'Usuario añadido satisfactoriamente');
    }

    public function update(Request $request, $id){
        $usuario = Usuario::find($id);

        $usuario->nombre = $request->get('nombre');
        $usuario->ap_paterno = $request->get('ap_paterno');
        $usuario->ap_materno = $request->get('ap_materno');
        $usuario->fec_nac = $request->get('fec_nac');
        $usuario->direccion = $request->get('direccion');
        $usuario->telefono = $request->get('telefono');
        $usuario->save();

        return redirect('principal')
        ->with('alerta', 'Usuario modificado satisfactoriamente');
    }

    public function destroy($id){
        $usuario = Usuario::find($id);
        $usuario->delete();

        return redirect('principal')
        ->with('alerta', 'Usuario eliminado satisfactoriamente');
    }
}
