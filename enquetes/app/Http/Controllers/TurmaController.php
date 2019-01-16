<?php

namespace App\Http\Controllers;

use App\Turmas;
use Request;
use App\Http\Requests\TurmaRequest;
use Illuminate\Http\Request as HttpRequest;

class TurmaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index($id){
        $listagem = Turmas::orderBy('Turma')->get();

        $editTurma = Turmas::find($id);

        if(empty($editTurma)){
            return view('administracao.turmas')->with(['listagem' => $listagem, 'turma' => $editTurma]);
        }

        return view('administracao.turmas')->with(['listagem' => $listagem, 'turma' => $editTurma]);
    }

    public function addTurma(TurmaRequest $request, $id){

        if($id == 0){
            Turmas::create($request->all());
        }else{
            Turmas::find($request->id)->update(Request::except($id));
        }

        return redirect()->action('TurmaController@index', $id = 0);
    }

    public function deletarTurma(HttpRequest $request){

        if(empty($request->id)){
            return TurmaController::index(0);
        }

        Turmas::find($request->id)->delete();

        return redirect()->action('TurmaController@index', $id = 0);
    }

}