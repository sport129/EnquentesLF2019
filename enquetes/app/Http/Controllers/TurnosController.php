<?php

namespace App\Http\Controllers;

use App\Turnos;
use Request;
use App\Http\Requests\TurnosRequest;
use Illuminate\Http\Request as HttpRequest;

class TurnosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index($id){
        $listagem = Turnos::all();

        $editTurno = Turnos::find($id);

        if(empty($editTurno)){
            return view('administracao.turno')->with(['listagem' => $listagem, 'turno' => $editTurno]);
        }

        return view('administracao.turno')->with(['listagem' => $listagem, 'turno' => $editTurno]);
    }

    public function addTurno(TurnosRequest $request, $id){

        if($id == 0){
            Turnos::create($request->all());
        }else{
            Turnos::find($request->id)->update(Request::except($id));
        }

        return redirect()->action('TurnosController@index', $id = 0);
    }

    public function deletarTurno(HttpRequest $request){

        if(empty($request->id)){
            return TurnosController::index(0);
        }

        Turnos::find($request->id)->delete();

        return redirect()->action('TurnosController@index', $id = 0);
    }
}
