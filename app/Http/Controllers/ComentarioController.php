<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;
class ComentarioController extends Controller
{
    public function show($id){
    	if (empty($id)) {
            return response()->json(['results' => 'El id es obligatorio', 'Codigo' => 406]);
        } else {
           //$Comen=Comentario::with('Usuario')->Where('idMovie',$id)->get();
             $Comen=Comentario::with('Usuario')->Where('idMovie',$id)->get();
            if (empty($Comen)) {
                return response()->json(['results' => 'No existen comentarios', 'Codigo' => 404]);
            } else {
                return response()->json(['results' => $Comen, 'Codigo' => 200]);
            }
        }
    }
     public function store(Request $request)
    {
        if (empty($request->comentario)||empty($request->idMovie)||empty($request->usuario_id)) {
            return response()->json(['result' => 'Todos los campos son obligatorios', 'Codigo' => 406]);
        } else {
            $Comen = new Comentario;
            $Comen->comentario = $request->comentario;
            $Comen->idMovie = $request->idMovie;
            $Comen->usuario_id = $request->usuario_id;
            $Comen->save();
            return response()->json(['result' => 'Comentario registrado', 'Codigo' => 201]);
        }
    }
}
