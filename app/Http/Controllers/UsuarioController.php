<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function usuarios()
    {
        //$data = DB::table('usuarios')->where('usuario_id', 1)->get();
        //$data = DB::connection('mysql2')->select("select * from usuarios where usuario_id = 2");
        $data = DB::connection('mysql2')->table('usuarios')->where('usuario_id', 1)->get();
        return response()->json([
            'message' => 'Success',
            'data' => $data
        ]);
    }

}
