<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as HttpRequest;
use Request;
use App\Ensino;
use App\Http\Requests\EnsinoRequest;

class EnsinoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index($id){
        $listagem = Ensino::orderBy('Ensino')->get();

        $editEnsino = Ensino::find($id);

        if(empty($editEnsino)){
            return view('administracao.ensino')->with(['listagem' => $listagem, 'ensino' => $editEnsino]);
        }

        return view('administracao.ensino')->with(['listagem' => $listagem, 'ensino' => $editEnsino]);
    }

    public function addEnsino(EnsinoRequest $request, $id){

        if($id == 0){
            Ensino::create($request->all());
        }else{
            Ensino::find($request->id)->update(Request::except($id));
        }

        return redirect()->action('EnsinoController@index', $id = 0);
    }

    public function deletarEnsino(HttpRequest $request){

        if(empty($request->id)){
            return EnsinoController::index(0);
        }

        Ensino::find($request->id)->delete();

        return redirect()->action('EnsinoController@index', $id = 0);
    }
}
