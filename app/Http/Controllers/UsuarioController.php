<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.jwt');
    }

    public function usuarios()
    {
        $user = JWTAuth::user();
        if ($user->hasAnyRole(['Administrador', 'Supervisor', 'Invitado']))
        {
            //$data = DB::connection('mysql2')->table('usuarios')->get();
            $data = DB::connection('mysql2')->select('call obtener(?)',array(1));
            return response()->json([
                'code' => '10',
                'message' => 'Peticion Exitosa',
                'data' => $data
            ]);
        }
        else {
            return response()->json([
                'code' => '20',
                'message' => 'No esta Habilitado'
            ]);
        }
        //$data = User::all();
        //$data = DB::table('usuarios')->where('usuario_id', 1)->get();
        //$data = DB::connection('mysql2')->select("select * from usuarios where usuario_id = 2");
        //$data = DB::connection('mysql2')->table('usuarios')->where('usuario_id', 1)->get();
        /*return response()->json([
            'message' => 'Success',
            'data' => $data
        ]);*/
    }
}
