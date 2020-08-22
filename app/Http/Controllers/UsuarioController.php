<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
class UsuarioController extends Controller
{

    public function store(Request $request)
    {
        if (empty($request->nombre)||empty($request->email)||empty($request->password)) {
            return response()->json(['Mensaje' => 'Todos los campos son obligatorios', 'Codigo' => 406]);
        } else {
            $usuario = new Usuario;
            $usuario->nombre = $request->nombre;
            $usuario->email = $request->email;
            $usuario->password = $request->password;
            $usuario->save();
            return response()->json(['Mensaje' => 'Usuario registrado', 'Codigo' => 201]);
        }
    }
     public function validar(Request $request)
    {
        $user=Usuario::where('email',$request->email)->where('password',$request->password)->get();
        if ($user->isEmpty()) {
            return response()->json(['result' => 'Usuario o contraseña incorrecto', 'Codigo' => 406]);
        } else {
            return response()->json(['result' => $user, 'Codigo' => 200]);
        }
    }

}
