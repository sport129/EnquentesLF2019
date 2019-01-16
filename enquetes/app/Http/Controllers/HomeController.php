<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Request as HttpRequest;
use App\Http\Requests\UserRequest;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function administracao(){
        $usuarios = DB::table('users')
                        ->join('tb_tipousers', 'users.tipoUser', '=', 'tb_tipousers.id_tipousers')
                        ->select('users.id', 'users.name', 'users.email', 'tb_tipousers.tipouser')
                        ->get();

        return view('administracao.users')->with(['usuarios' => $usuarios]);
    }

    public function cadastrar(){
        return view('administracao.cadastro');
    }

    public function update($id){
        $usuario = User::find($id);

        return view('administracao.updateUser')->with(['usuario' => $usuario]);
    }

    public function attUser(HttpRequest $request, $id){
        $user = User::find($id);
        $user->name = HttpRequest::input('name');
        $user->email = HttpRequest::input('email');
        $user->tipoUser = HttpRequest::input('tipoUser');

        $user->save();

        return redirect()->action('HomeController@administracao');
    }

    public function deleteUser(Request $request){
        if(empty($request->id)){
            return HomeController::administracao();
        }

        User::find($request->id)->delete();

        return redirect()->action('HomeController@administracao');
    }
}
