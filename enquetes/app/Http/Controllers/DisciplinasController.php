<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as HttpRequest;
use Request;
use App\Disciplinas;
use App\Http\Requests\DisciplinasRequest;

class DisciplinasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index($id){
        $listagem = Disciplinas::orderBy('disciplina')->get();

        $editDisciplina = Disciplinas::find($id);

        if(empty($editDisciplina)){
            return view('administracao.disciplina')->with(['listagem' => $listagem, 'disciplina' => $editDisciplina]);
        }

        return view('administracao.disciplina')->with(['listagem' => $listagem, 'disciplina' => $editDisciplina]);
    }

    public function addDisciplina(DisciplinasRequest $request, $id){

        if($id == 0){
            Disciplinas::create($request->all());
        }else{
            Disciplinas::find($request->id)->update(Request::except($id));
        }

        return redirect()->action('DisciplinasController@index', $id = 0);
    }

    public function deletarDisciplina(HttpRequest $request){

        if(empty($request->id)){
            return DisciplinasController::index(0);
        }

        Disciplinas::find($request->id)->delete();

        return redirect()->action('DisciplinasController@index', $id = 0);
    }
}
